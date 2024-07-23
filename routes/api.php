<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Соответствует URL-адресу `/admin/users` ...
//     });
// });
Route::prefix('tasks')->group(function () {
    Route::get('/', []);
    Route::post('/', []);
    Route::patch('/', []);
    Route::delete('/', []);
});
