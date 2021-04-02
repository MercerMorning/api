<?php

namespace MercerMorning\Api;

use Illuminate\Support\ServiceProvider;
use MercerMorning\Api\Console\Commands\GenerateApi;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
        $this->publishes([
            __DIR__.'/../config/api.php' => config_path('apiLpr.php'),
            __DIR__.'/IlpService.php' => app_path('/Services/.IlpService.php')
        ]);
    }

    public function bootForConsole()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateApi::class
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/api.php', 'api');

        // Register the service the package provides.
        $this->app->singleton('api', function ($app) {
            return new Api;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['api'];
    }

}
