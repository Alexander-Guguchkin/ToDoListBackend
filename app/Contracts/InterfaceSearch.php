<?php

namespace App\Contracts;
use App\Models\Task;
use \Illuminate\Http\JsonResponse;
interface InterfaceSearch
{
    public function searchTask(Task $id): JsonResponse;
    public function searchCompleteTask(Task $id): JsonResponse;
}
