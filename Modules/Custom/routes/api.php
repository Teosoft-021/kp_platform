<?php

use Illuminate\Support\Facades\Route;
use Modules\Custom\Http\Controllers\CustomController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('customs', CustomController::class)->names('custom');
});
