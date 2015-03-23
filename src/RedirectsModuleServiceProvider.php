<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Http\Request;
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
        'admin/redirects'             => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@index',
        'admin/redirects/create'      => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@create',
        'admin/redirects/edit/{id}'   => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@edit',
        'admin/redirects/delete/{id}' => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@delete'
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\RedirectsModule\Redirect\RedirectModel' => 'Anomaly\RedirectsModule\Redirect\RedirectModel'
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
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded' => [
            'Anomaly\RedirectsModule\Redirect\Listener\Redirect'
        ]
    ];

}
