<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\TaskController;


Route::prefix('v1')->group(function () {

    Route::middleware('throttle:api')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login'])
            ->middleware('throttle:login');
    });

    Route::middleware(['throttle:api', 'auth:sanctum'])->group(function () {
        Route::apiResource('tasks', TaskController::class);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});


