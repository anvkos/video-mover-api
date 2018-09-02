<?php

namespace App\Models;

use App\Models\Video;
use App\Models\Storage;
use App\Models\VideoCounter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function videos()
    {
        return $this->hasMany(Video::class, 'file_id', 'id');
    }

    public function scopeByStorages(Builder $query, array $ids): Builder
    {
        return $query->whereIn('video_files.storage_id', $ids);
    }

    public function scopeByFileSize(Builder $query, string $sign, int $size): Builder
    {
        return $query->where('file_size', $sign, $size);
    }

    public function scopeByViews(Builder $query, string $sign, int $number, string $counterName, string $sorting_direction): Builder
    {
        return $query->select('video_files.*')
                     ->join('videos', 'videos.file_id', '=', 'video_files.id')
                     ->join('video_counters', 'video_counters.video_id', '=', 'videos.id')
                     ->where("video_counters.{$counterName}", $sign, $number)
                     ->orderBy("video_counters.{$counterName}", $sorting_direction);
    }

    public function scopeByCreatedDaysAgo(Builder $query, string $sign, int $numberDays): Builder
    {
        return $query->where('video_files.created_at', $sign, Carbon::now()->subDays($numberDays));
    }

    public function isEncoded(): bool
    {
        return $this->status === self::STATUS_ENCODED;
    }
}
