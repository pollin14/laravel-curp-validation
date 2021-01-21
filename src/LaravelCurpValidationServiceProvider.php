<?php

namespace Pollin14\LaravelCurpValidation;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelCurpValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/LaravelCurpValidation.php', 'laravel-curp-validation');

        $this->publishConfig();

        // $this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-curp-validation');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->registerRoutes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('laravel-curp-validation', function () {
            return new LaravelCurpValidation;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/LaravelCurpValidation.php' => config_path('LaravelCurpValidation.php'),
            ], 'config');
        }
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        });
    }

    /**
     * Get route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => "Pollin14\LaravelCurpValidation\Http\Controllers",
            'middleware' => 'api',
            'prefix' => 'api',
        ];
    }
}
