<?php

namespace Vendor\OnlineStore\Providers;

use Illuminate\Support\ServiceProvider;
use Vendor\OnlineStore\Services\DeliveryService;

class OnlineStoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('delivery', function () {
            return new DeliveryService();
        });

        $this->mergeConfigFrom(__DIR__.'/../Config/onlinestore.php', 'onlinestore');
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'onlinestore');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/onlinestore.php' => config_path('onlinestore.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../Resources/views' => resource_path('views/vendor/onlinestore'),
            ], 'views');
        }
    }
}
