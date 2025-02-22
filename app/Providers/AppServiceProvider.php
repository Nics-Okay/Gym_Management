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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected $middlewareAliases = [
    // Existing middleware aliases
    'admin.verified' => \App\Http\Middleware\EnsureAdminVerified::class,
];
}
