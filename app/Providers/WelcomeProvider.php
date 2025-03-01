<?php

namespace App\Providers;

use App\Services\Infra\Persian;
use App\Services\Welcome;
use Illuminate\Support\ServiceProvider;

class WelcomeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Welcome::class , function ($app){
             return new Welcome(new Persian());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
