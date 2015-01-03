<?php namespace Anomaly\RedirectsModule\Provider;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controller namespace prefix for this addon.
     *
     * @var string
     */
    protected $prefix = 'Anomaly\RedirectsModule\Http\Controller\\';

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->registerRedirectRoutes();
        $this->registerExtensionRoutes();
    }

    /**
     * Register redirect routes.
     */
    protected function registerRedirectRoutes()
    {
        app('router')->any('admin/redirects', $this->prefix . 'Admin\RedirectsController@index');
    }

    /**
     * Register extension routes.
     */
    protected function registerExtensionRoutes()
    {
        app('router')->any('admin/redirects/extensions', $this->prefix . 'Admin\ExtensionsController@index');
    }
}
 