<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Contracts\InterfaceTask;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller implements InterfaceTask
{
    public function createTask(TaskRequest $request){
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
    public function editTask(TaskRequest $request, Task $id){
        $validated = $request->validated();
        $id->update($validated);
    }
    public function deleteTask(Task $id){
        $id->delete();
    }
     public function completeTask(Task $id){
        $task = Task::find($id);
        $task->status = true;
     }
}
