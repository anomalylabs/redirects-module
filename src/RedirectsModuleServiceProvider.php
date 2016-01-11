<?php namespace Anomaly\RedirectsModule;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
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
     * @param Router                      $router
     * @param Request                     $request
     * @param RedirectRepositoryInterface $redirects
     * @internal param Filesystem $files
     * @internal param Application $application
     */
    public function map(Router $router, Request $request, RedirectRepositoryInterface $redirects)
    {
        if ($request->segment(1) == 'admin') {
            return;
        }

        /* @var RedirectInterface $redirect */
        foreach ($redirects->all() as $redirect) {

            $url = parse_url($redirect->getFrom());

            if (isset($url['host'])) {

                /**
                 * Route a domain redirect in a domain group.
                 */
                $router->group(
                    ['domain' => $url['host']],
                    function () use ($url, $router, $redirect) {

                        if (str_contains($from = $redirect->getFrom(), '/')) {

                            $parts = explode('/', $from, 2);

                            $path = array_pop($parts);
                        } else {
                            $path = '/';
                        }

                        $router->any(
                            $path ?: '/',
                            [
                                'uses'        => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                                'redirect'    => $redirect->getId(),
                                'constraints' => [
                                    'any'  => '(.*)',
                                    'path' => '(.*)'
                                ]
                            ]
                        );
                    }
                );
            } else {

                /**
                 * Route a standard redirect.
                 */
                $router->any(
                    $redirect->getFrom(),
                    [
                        'uses'        => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                        'redirect'    => $redirect->getId(),
                        'constraints' => [
                            'any'  => '(.*)',
                            'path' => '(.*)'
                        ]
                    ]
                );
            }
        }
    }
}
