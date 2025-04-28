<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('api')->middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
       Route::apiResource('/categories', CategoryController::class);
       Route::apiResource('/posts', PostController::class);
       Route::post('/logout', [AuthController::class, 'logout']);
    });
});
