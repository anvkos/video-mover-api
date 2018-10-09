<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StorageTask extends Model
{
    public const KIND_SOURCE = 'source';
    public const KIND_DESTINATION = 'destination';

    protected $table = 'storage_storages_tasks';

    protected $fillable = [
        'storage_id', 'kind',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }

    public function scopeSource(Builder $query): Builder
    {
        return $query->where('kind', self::KIND_SOURCE);
    }

    public function scopeDestination(Builder $query): Builder
    {
        return $query->where('kind', self::KIND_DESTINATION);
    }
}
