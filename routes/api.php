<?php

use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\JwtMiddleware;

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);

    Route::post('/tasks', [TaskController::class, 'create']);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
});