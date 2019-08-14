<?php

namespace Placid\Laravel;

use Illuminate\Support\ServiceProvider;

class PlacidLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../config/config.php' => config_path(
                        'placid.php'
                    )
                ],
                'config'
            );
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'placid');

        app()->bind('placid', function () {
            return new PlacidLaravelService(
                config('placid.api-token'),
                config('placid.webhook_url')
            );
        });
    }
}
