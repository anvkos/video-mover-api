<?php

use App\Models\Task;
use App\Models\Storage;
use App\Models\VideoFile;
use App\Models\Operation;

$factory->define(Operation::class, function ($attributes = []) {
    $taskId = $attributes['task_id'] ?? factory(Task::class)->create()->id;
    $srcStorageId = $attributes['src_storage_id'] ?? factory(Storage::class)->create()->id;
    $dstStorageId = $attributes['dst_storage_id'] ?? factory(Storage::class)->create()->id;
    $fileId = $attributes['file_id'] ?? factory(VideoFile::class)->create(['storage_id' => $srcStorageId])->id;
    return [
        'task_id' => $taskId,
        'src_storage_id' => $srcStorageId,
        'dst_storage_id' => $dstStorageId,
        'file_id' => $fileId,
        'action' => Task::ACTION_MOVE,
        'status' => Operation::STATUS_NEW,
    ];
});
