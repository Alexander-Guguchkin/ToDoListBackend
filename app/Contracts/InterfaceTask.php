<?php

namespace App\Contracts;
use App\Http\Requests\TaskRequest;
interface InterfaceTask
{
    public function createTask(TaskRequest $request);
    public function getTasks();
    // public function getTask();
    // public function getLastTask();
    // public function editTask();
    // public function deleteTask();
    // public function completeTask();
}
