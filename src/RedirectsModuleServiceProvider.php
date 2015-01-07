<?php namespace Anomaly\RedirectsModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class RedirectsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule
 */
class RedirectsModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\RedirectsModule\Provider\RouteServiceProvider');
        $this->app->register('Anomaly\RedirectsModule\Redirect\RedirectServiceProvider');
    }
}
