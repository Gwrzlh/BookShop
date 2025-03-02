<?php

namespace App\Providers;

use App\Http\Middleware\checkUser;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Routing\Router;
use App\Http\Middleware\PreventBackMiddleware;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         $this->app->make(Router::class)->aliasMiddleware('checkRole', CheckUserRole::class);
         $this->app->make(Router::class)->aliasMiddleware('preventBack', PreventBackMiddleware::class);
    }
}
