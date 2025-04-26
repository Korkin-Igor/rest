<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('/categories', CategoryController::class);
        Route::apiResource('/posts', PostController::class);
    });
});
