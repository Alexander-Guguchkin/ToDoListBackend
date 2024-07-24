<?php

namespace App\Contracts;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

interface InterfaceTask
{
    public function createTask(TaskRequest $request);
    public function getTasks();
    public function getLastTask();
    public function editTask(TaskRequest $request, Task $id);
    // public function deleteTask();
    // public function completeTask();
}
