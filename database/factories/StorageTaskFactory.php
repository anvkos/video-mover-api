<?php

use App\Models\Task;
use App\Models\Storage;
use App\Models\StorageTask;

$factory->define(StorageTask::class, function ($attributes = []) {
    $taskId = $attributes['task_id'] ?? factory(Task::class)->create()->id;
    $kind = $attributes['kind'] ?? StorageTask::KIND_SOURCE;
    $storageId = $attributes['storage_id'] ?? factory(Storage::class)->create()->id;
    return [
        'task_id' => $taskId,
        'storage_id' => $storageId,
        'kind' => $kind,
    ];
});

$factory->defineAs(StorageTask::class, 'source', function($attributes = []) use ($factory) {
    $storageTask = $factory->raw(StorageTask::class, ['kind' => StorageTask::KIND_SOURCE]);
    return array_merge($storageTask, $attributes);
});

$factory->defineAs(StorageTask::class, 'destination', function($attributes = []) use ($factory) {
    $storageTask = $factory->raw(StorageTask::class, ['kind' => StorageTask::KIND_DESTINATION]);
    return array_merge($storageTask, $attributes);
});
