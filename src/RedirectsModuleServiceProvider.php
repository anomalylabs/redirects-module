<?php namespace Anomaly\RedirectsModule;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;

/**
 * Class RedirectsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule
 */
class RedirectsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/redirects'           => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@index',
        'admin/redirects/create'    => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@create',
        'admin/redirects/edit/{id}' => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@edit'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface' => 'Anomaly\RedirectsModule\Redirect\RedirectRepository'
    ];

    /**
     * Map the redirect routes.
     *
     * @param Filesystem  $files
     * @param Application $application
     */
    public function map(Router $router, RedirectRepositoryInterface $redirects)
    {
        /* @var RedirectInterface $redirect */
        foreach ($redirects->all() as $redirect) {
            $router->any(
                $redirect->getFrom(),
                [
                    'uses'     => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                    'redirect' => $redirect->getId()
                ]
            );
        }
    }
}
