<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Statamic\Statamic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Vite assets for Statamic Control Panel
        Statamic::vite('app', [
            'resources/js/cp.js',    // Control Panel JS
            'resources/css/cp.css', // Optional Control Panel CSS
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
