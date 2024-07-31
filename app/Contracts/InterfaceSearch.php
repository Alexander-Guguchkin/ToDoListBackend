<?php

namespace App\Contracts;
use App\Http\Requests\TaskRequest;
use \Illuminate\Http\JsonResponse;

interface InterfaceSearch
{
    public function searchTask(TaskRequest $request): JsonResponse;
    public function searchCompleteTask(): JsonResponse;
}
