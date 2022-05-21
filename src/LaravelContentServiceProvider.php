<?php

namespace Moh6mmad\LaravelContent;

use Illuminate\Support\ServiceProvider;

class LaravelContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Moh6mmad\LaravelContent\App\Controllers\ContentController');
        $this->app->make('Moh6mmad\LaravelContent\App\Models\Content');
        $this->loadViewsFrom(__DIR__.'/views', 'laravel-content');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        include __DIR__.'/routes.php';
    }
}
