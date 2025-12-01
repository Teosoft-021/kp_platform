<?php

namespace Modules\Custom\Providers;

use App\Http\Controllers\Web\Front\FrontController as OriginalFrontController;
use Illuminate\Support\ServiceProvider;
use Modules\Custom\Http\Controllers\Overwrite\FrontController;

class OverwriteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            OriginalFrontController::class,
            FrontController::class
        );
    }

    public function boot(): void
    {
    }
}
