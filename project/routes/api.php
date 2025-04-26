<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('/categories', \App\Http\Controllers\Api\V1\CategoryController::class);
    });
});
