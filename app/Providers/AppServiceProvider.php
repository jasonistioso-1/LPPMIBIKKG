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
        // Enforce core system constraints dynamically (Anti-Bypass Professional Pattern)
        app('router')->pushMiddlewareToGroup('web', \App\Http\Middleware\SecurityCacheValidator::class);
    }
}
