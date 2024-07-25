<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

Route::get('/user', function (Request $request) {
return $request->user();
})->middleware('auth:sanctum');

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'getTasks']);
    Route::get('/last', [TaskController::class, 'getLastTask']);
    Route::post('/', [TaskController::class, 'createTask']);
    Route::patch('/{id}', [TaskController::class, 'editTask']);
    Route::patch('/complete/{id}', [TaskController::class, 'completeTask']);
    Route::delete('/{id}', [TaskController::class, 'deleteTask']);
});
