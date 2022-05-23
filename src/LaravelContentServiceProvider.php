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
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('content.php');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       
        $configPath = __DIR__ . '/config/content.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
        $this->publishes([__DIR__ . '/resources/views' => base_path('/resources/views/vendor/laravel-content')], 'views');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        include __DIR__.'/routes.php';
    }
}
