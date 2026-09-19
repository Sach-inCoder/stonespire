<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SettingService;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            SettingService::class,
            function () {
                return new SettingService();
            }
        );
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
