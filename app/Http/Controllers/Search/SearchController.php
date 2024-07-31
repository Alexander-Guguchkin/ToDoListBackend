<?php

namespace App\Http\Controllers\Search;

use App\Contracts\InterfaceSearch;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use \Illuminate\Http\JsonResponse;

class SearchController extends Controller implements InterfaceSearch
{
    public function searchTask(TaskRequest $request): JsonResponse
    {
        $task = $request->validated();
        $res = Task::where('text', '=', $task)->get();
       return response()->json([
        'tasks' => $res
       ]);
    }
    public function searchCompleteTask(): JsonResponse
    {
        $res = Task::where('status', '=', true)->get();
        return response()->json([
            'tasks' => $res
        ]);
    }
}
