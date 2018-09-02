<?php

namespace App\Models;

use App\Models\Storage;
use App\Models\StorageTask;
use App\Models\TaskCriterion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    public const ACTION_COPY   = 'copy';
    public const ACTION_MOVE   = 'move';
    public const ACTION_DELETE = 'delete';

    public const STATUS_PENDING   = 'pending';
    public const STATUS_RUNNING   = 'running';
    public const STATUS_COMPLETED = 'completed';

    protected $table = 'storage_tasks';

    protected $fillable = [
        'title', 'enabled', 'status', 'action', 'number_files', 'size_files'
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function scopeEnaled(Builder $query): Builder
    {
        return $query->where('enabled', true);
    }

    public static function actionsList(): array
    {
        return [
            self::ACTION_COPY,
            self::ACTION_MOVE,
            self::ACTION_DELETE,
        ];
    }

    public static function statusesList(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_RUNNING,
            self::STATUS_COMPLETED,
        ];
    }

    public function storages()
    {
        return $this->belongsToMany(Storage::class, 'storage_storages_tasks')->withTimestamps();
    }

    public function criteria()
    {
        return $this->hasMany(TaskCriterion::class)->withTimestamps();
    }

    public function sourceStorages()
    {
        return $this->storages()->where('kind', StorageTask::KIND_SOURCE);
    }

    public function destinationStorages()
    {
        return $this->storages()->where('kind', StorageTask::KIND_DESTINATION);
    }

    public function sourceStorageIds()
    {
        return $this->sourceStorages()->pluck('storage_id');
    }

    public function destinationStorageIds()
    {
        return $this->destinationStorages()->pluck('storage_id');
    }
}
