<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }

    public function videoFile()
    {
        return $this->belongsTo(VideoFile::class, 'file_id', 'id');
    }
}
