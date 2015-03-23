<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

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
        'admin/redirects'             => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@index',
        'admin/redirects/create'      => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@create',
        'admin/redirects/edit/{id}'   => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@edit',
        'admin/redirects/delete/{id}' => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@delete'
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

}
