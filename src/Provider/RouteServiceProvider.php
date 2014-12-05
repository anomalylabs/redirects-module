<?php namespace Anomaly\Streams\Addon\Module\Redirects\Provider;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controller namespace prefix for this addon.
     *
     * @var string
     */
    protected $prefix = 'Anomaly\Streams\Addon\Module\Redirects\Http\Controller\\';

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->registerRedirectRoutes();
    }

    /**
     * Register redirect routes.
     */
    protected function registerRedirectRoutes()
    {
        app('router')->any('admin/redirects', $this->prefix . 'Admin\RedirectsController@index');
    }
}
 