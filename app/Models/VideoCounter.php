<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCounter extends Model
{
    protected $fillable = ['views', 'views_day'];

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }
}
