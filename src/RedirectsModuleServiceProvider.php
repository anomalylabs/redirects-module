<?php namespace Anomaly\RedirectsModule;

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
        //$this->app->register('Anomaly\RedirectsModule\Provider\ServiceProvider');

        $this->app->register('Anomaly\RedirectsModule\Provider\RouteServiceProvider');
    }
}
 