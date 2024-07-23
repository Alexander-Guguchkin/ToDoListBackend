<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\InterfaceTask;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;

class TaskController extends Controller implements InterfaceTask
{
    public function createTask(TaskRequest $request){
        $validated = $request->validated();
        Task::create($validated);
    }
    public function getTasks(){
        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks
        ]);
    }
    // public function getTask();
    // public function getLastTask();
    // public function editTask();
    // public function deleteTask();
    // public function completeTask();
}
