<?php

namespace Novanova\EightBitIcon\Support\Laravel;

use Illuminate\Support\ServiceProvider;
use Novanova\EightBitIcon\EightBitIcon;

class EightBitIconServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('2nova/eight-bit-icon');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['eightbiticon'] = $this->app->share(
            function ($app) {
                return new EightBitIcon;
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}