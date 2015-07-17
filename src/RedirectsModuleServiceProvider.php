<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

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
     * Map additional routes.
     *
     * @param Filesystem  $files
     * @param Application $application
     */
    public function map(Filesystem $files, Application $application)
    {
        if ($files->exists($routes = $application->getStoragePath('redirects/routes.php'))) {
            $files->requireOnce($routes);
        }
    }
}
