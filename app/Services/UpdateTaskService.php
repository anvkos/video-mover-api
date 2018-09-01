<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Storage;
use App\Models\StorageTask;

class UpdateTaskService
{
    public function perform(int $taskId, Array $params)
    {
        $task = Task::findOrFail($taskId);
        $task->update([
            'title' => $params['title'],
            'enabled' => $params['enabled'],
            'action' => $params['action'],
            'number_files' => $params['number_files'],
        ]);
        $srcStorages = array_fill_keys($params['src_storage_ids'], ['kind' => StorageTask::KIND_SOURCE]);
        $dstStorages = array_fill_keys($params['dst_storage_ids'], ['kind' => StorageTask::KIND_DESTINATION]);
        $task->storages()->sync($srcStorages + $dstStorages);
        return $task;
    }
}
