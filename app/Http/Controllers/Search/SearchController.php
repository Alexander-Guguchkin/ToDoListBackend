<?php

namespace App\Http\Controllers\Search;

use App\Contracts\InterfaceSearch;
use App\Http\Controllers\Controller;
use App\Models\Task;
use \Illuminate\Http\JsonResponse;

class SearchController extends Controller implements InterfaceSearch
{
    public function searchTask(Task $textTask): JsonResponse
    {
       return response()->json([
        'tasks' => $textTask->text // нужно пробрасывать id сюда
       ]);
    }
    public function searchCompleteTask(Task $id): JsonResponse
    {
        if ($id->status === true){
            return response()->json([
                'tasks' => $id
            ]);
        }
    }
}
