<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public const GROUP_ARCHIVE = 'archive';
    public const GROUP_SLOW    = 'slow';
    public const GROUP_FAST    = 'fast';
    public const GROUP_CACHE   = 'cache';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'domain', 'host', 'data_path', 'group', 'free_space', 'used_space',
    ];

    public function VideoFiles()
    {
        return $this->hasMany(VideoFile::class);
    }
}
