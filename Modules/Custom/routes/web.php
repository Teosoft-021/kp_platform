<?php

use Illuminate\Support\Facades\Route;
use Modules\Custom\Http\Controllers\CustomController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('customs', CustomController::class)->names('custom');
});
