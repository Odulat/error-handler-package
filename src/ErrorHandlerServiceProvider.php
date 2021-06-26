<?php

namespace Dulat\ErrorHandler;

use Dulat\ErrorHandler\Repositories\Eloquent\ErrorExceptionRepositoryEloquent;
use Dulat\ErrorHandler\Repositories\ErrorExceptionRepositoryContract;
use Dulat\ErrorHandler\Singletones\ErrorHandler;
use Illuminate\Support\ServiceProvider;

class ErrorHandlerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'error-handler');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/../config/error_handler.php', 'error_handler'
        );
        $this->publishes(
            [
                __DIR__.'/../config/error_handler.php' => config_path('error_handler.php'),
            ]
        );
    }

    public function register()
    {
        $this->app->singleton('error-handler', function () {
            return new ErrorHandler();
        });
        $this->app->bind(
            ErrorExceptionRepositoryContract::class,
            ErrorExceptionRepositoryEloquent::class
        );
    }
}