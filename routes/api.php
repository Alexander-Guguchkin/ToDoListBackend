<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'getTasks']);
    Route::get('/getLastTask', [TaskController::class, 'getLastTask']);
    Route::post('/', [TaskController::class, 'createTask']);
    Route::patch('/{id}', [TaskController::class, 'editTask']);
    Route::delete('/{id}', []);
});
