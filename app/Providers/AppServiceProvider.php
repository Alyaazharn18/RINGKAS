<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('blade.compiler', function ($app) {
            return new \Illuminate\View\Compilers\BladeCompiler(
                $app['files'],
                '/tmp'
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') !== 'local') {
        URL::forceScheme('https');
    }
    // Atau jika ingin selalu aktif saat pakai ngrok:
    if (request()->server('HTTP_X_FORWARDED_PROTO') == 'https') {
        URL::forceScheme('https');
    }
    }
}
