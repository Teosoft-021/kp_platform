<?php

use Illuminate\Support\Facades\Route;
use Modules\MyFirstModule\Http\Controllers\MyFirstModuleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('myfirstmodules', MyFirstModuleController::class)->names('myfirstmodule');
});
