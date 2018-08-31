<?php

namespace App\Models;

use App\Models\Storage;
use Illuminate\Database\Eloquent\Model;

class VideoFile extends Model
{
    public const STATUS_UPLOADING = 0;
    public const STATUS_READY_FOR_ENCODING = 1;
    public const STATUS_ENCODING = 2;
    public const STATUS_ENCODED = 3;
    public const STATUS_ERROR_ENCODING = 4;
    public const STATUS_LOST = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_size', 'status',
    ];

    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }

    public function isEncoded(): bool
    {
        return $this->status === self::STATUS_ENCODED;
    }
}
