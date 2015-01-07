<?php namespace Anomaly\RedirectsModule\Provider;

use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Provider
 */
class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * Map the module's routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $this->mapRedirectRoutes($router);
    }

    /**
     * Map redirect routes.
     *
     * @param Router $router
     */
    protected function mapRedirectRoutes(Router $router)
    {
        $router->any(
            'admin/redirects',
            'Anomaly\RedirectsModule\Http\Controller\RedirectsController@index'
        );
        $router->any(
            'admin/redirects/create',
            'Anomaly\RedirectsModule\Http\Controller\RedirectsController@create'
        );
        $router->any(
            'admin/redirects/edit/{id}',
            'Anomaly\RedirectsModule\Http\Controller\RedirectsController@edit'
        );
    }
}
