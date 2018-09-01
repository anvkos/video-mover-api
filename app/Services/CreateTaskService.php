<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Storage;
use App\Models\StorageTask;

class CreateTaskService
{
    public function perform(Array $params)
    {
        $task = Task::create([
            'title' => $params['title'],
            'enabled' => $params['enabled'],
            'status' => Task::STATUS_PENDING,
            'action' => $params['action'],
            'number_files' => $params['number_files'],
        ]);
        foreach ($params['src_storage_ids'] as $id) {
            $task->storages()->attach($id, ['kind' => StorageTask::KIND_SOURCE]);
        }
        foreach ($params['dst_storage_ids'] as $id) {
            $task->storages()->attach($id, ['kind' => StorageTask::KIND_DESTINATION]);
        }
        return $task;
    }
}
