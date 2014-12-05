<?php namespace Anomaly\Streams\Addon\Module\Redirects;

use Illuminate\Support\ServiceProvider;

class RedirectsModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->register('Anomaly\Streams\Addon\Module\Redirects\Provider\ServiceProvider');

        $this->app->register('Anomaly\Streams\Addon\Module\Redirects\Provider\RouteServiceProvider');
    }
}
 