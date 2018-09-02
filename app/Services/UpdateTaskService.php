<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Storage;
use App\Models\StorageTask;
use Illuminate\Support\Facades\DB;

class UpdateTaskService
{
    public function perform(int $taskId, Array $params): Task
    {
        return DB::transaction(function () use ($taskId, $params) {
            $task = Task::findOrFail($taskId);
            $task->update([
                'title' => $params['title'],
                'enabled' => $params['enabled'],
                'action' => $params['action'],
                'number_files' => $params['number_files'],
                'size_files' => $params['size_files'],
            ]);
            $srcStorages = array_fill_keys($params['src_storage_ids'], ['kind' => StorageTask::KIND_SOURCE]);
            $dstStorages = array_fill_keys($params['dst_storage_ids'], ['kind' => StorageTask::KIND_DESTINATION]);
            $task->storages()->sync($srcStorages + $dstStorages);
            $task->criteria()->delete();
            $task->criteria()->createMany($params['criteria']);
            return $task;
        });
    }
}
