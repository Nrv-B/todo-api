<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\TaskFilterRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
    public function __construct(
        private TaskService $taskService
    ) {}

    public function index()
    {
        return TaskResource::collection(Task::paginate(10));
    }


    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->create($request->validated());

        return response()->json([
            'message' => 'Task created successfully',
            'data' => new TaskResource($task)
        ], 201);
    }
    

    public function show(Task $task)
    {
        return new TaskResource($task);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task = $this->taskService->update($task, $request->validated());

        return response()->json([
            'message' => 'Task updated successfully',
            'data' => new TaskResource($task)
        ], 200);
    }


    public function destroy(Task $task)
    {
        $this->taskService->delete($task);

        return response()->json([
            'message' => 'Task deleted '
        ], 200);
    }
}
