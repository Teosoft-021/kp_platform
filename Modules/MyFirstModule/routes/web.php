<?php

use Illuminate\Support\Facades\Route;
use Modules\MyFirstModule\Http\Controllers\MyFirstModuleController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('myfirstmodules', MyFirstModuleController::class)->names('myfirstmodule');
});
