<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\Api\V1\Tasks\CreateRequest;
use App\Http\Requests\Api\V1\Tasks\UpdateRequest;
use App\Http\Resources\Api\V1\Tasks\TaskResource;
use App\Http\Resources\Api\V1\Tasks\TasksResource;
use App\Services\CreateTaskService;
use App\Services\UpdateTaskService;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(25);
        return new TasksResource($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $task = Task::find(7);
        $service = new CreateTaskService();
        $task = $service->perform($request->only([
            'title', 'enabled', 'action', 'number_files', 'size_files', 'src_storage_ids', 'dst_storage_ids', 'criteria'
        ]));
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Task $task)
    {
        $service = new UpdateTaskService();
        $task = $service->perform(
            $task->id,
            $request->only([
                'title', 'enabled', 'action', 'number_files', 'size_files', 'src_storage_ids', 'dst_storage_ids', 'criteria'
        ]));
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
