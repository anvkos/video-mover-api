<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Storage;
use App\Models\VideoFile;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public const STATUS_NEW       = 'new';
    public const STATUS_EXECUTING = 'executing';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_ERROR     = 'error';
    public const STATUS_CANCELED  = 'canceled';

    public const ERROR_FILE_MISSING     = 'file_missing';
    public const ERROR_STORAGE_TIMEOUT  = 'storage_timeout';
    public const ERROR_NO_FREE_SPACE    = 'no_free_space';
    public const ERROR_FILE_NOT_DELETED = 'file_not_deleted';
    public const ERROR_FILE_NOT_CREATED = 'file_not_created';
    public const ERROR_EXECUTION_TIME_EXCEEDED = 'execution_time_exceeded';

    protected $table = 'storage_operations';

    protected $fillable = [
        'action', 'status', 'error', 'error_message',
    ];

    public static function statusesList(): array
    {
        return [
            self::STATUS_NEW,
            self::STATUS_EXECUTING,
            self::STATUS_COMPLETED,
            self::STATUS_ERROR,
            self::STATUS_CANCELED,
        ];
    }

    public static function errorsList(): array
    {
        return [
            self::ERROR_FILE_MISSING,
            self::ERROR_STORAGE_TIMEOUT,
            self::ERROR_NO_FREE_SPACE,
            self::ERROR_FILE_NOT_DELETED,
            self::ERROR_FILE_NOT_CREATED,
            self::ERROR_EXECUTION_TIME_EXCEEDED,
        ];
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function videoFile()
    {
        return $this->belongsTo(VideoFile::class, 'file_id', 'id');
    }

    public function sourceStorage()
    {
        return $this->belongsTo(Storage::class, 'src_storage_id', 'id');
    }

    public function destinationStorage()
    {
        return $this->belongsTo(Storage::class, 'dst_storage_id', 'id');
    }
}
