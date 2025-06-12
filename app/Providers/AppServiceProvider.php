<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Gunakan ini untuk binding class, helper, config, dsb.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tempat untuk custom logic saat aplikasi booting
    }
}
