<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Contracts\InterfaceTask;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller implements InterfaceTask
{
    public function createTask(TaskRequest $request): void
    {
        $validated = $request->validated();
        Task::create($validated);
    }
    public function getTasks(): JsonResponse{
        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks
        ]);
    }
    public function getLastTask(): JsonResponse{
        $task = Task::latest()->first();
        return response()->json([
            'task' => $task
        ]);
    }
    public function editTask(TaskRequest $request, Task $id): void
    {
        $validated = $request->validated();
        $id->update($validated);
    }
    public function deleteTask(Task $id): void
    {
        $id->delete();
    }
     public function completeTask(Task $id)
     {
        $id->update(['status' => true]);
     }
}
