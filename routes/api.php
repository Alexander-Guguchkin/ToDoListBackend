<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Search\SearchController;

Route::get('/user', function (Request $request) {
return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', function(Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
    return $user;
});
Route::middleware('throttle:auth')->post('/login', function(Request $request) {
    $credentials = $request->only('email', 'password');
    if (!auth()->attempt($credentials)) {
        throw ValidationException::withMessages([
            'login' => 'Invalid credentials'
        ]);
    }
    $request->session()->regenerate();
    return response()->json([
        'message' => 'You are logged in!'
    ], 200);
});
Route::get('/logout', function(Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return response()->json([
        'message' => 'You are logged out!'
    ], 200);
});
Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/test', function (){
        dump('test');
    });
});
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'getTasks']);
    Route::get('/last', [TaskController::class, 'getLastTask']);
    Route::post('/', [TaskController::class, 'createTask']);
    Route::patch('/{id}', [TaskController::class, 'editTask']);
    Route::patch('/complete/{id}', [TaskController::class, 'completeTask']);
    Route::delete('/{id}', [TaskController::class, 'deleteTask']);
});
Route::prefix('search')->group(function () {
    Route::get('/{text}', [SearchController::class, 'searchTask']);
    Route::get('/complete/', [SearchController::class, 'searchCompleteTask']);
});
