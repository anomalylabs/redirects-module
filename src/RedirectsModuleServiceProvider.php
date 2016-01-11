<?php namespace Anomaly\RedirectsModule;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Contracts\Routing\UrlGenerator;
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
     * @param UrlGenerator                $url
     * @param Router                      $router
     * @param Request                     $request
     * @param RedirectRepositoryInterface $redirects
     * @internal param Filesystem $files
     * @internal param Application $application
     */
    public function map(UrlGenerator $url, Router $router, Request $request, RedirectRepositoryInterface $redirects)
    {
        if ($request->segment(1) == 'admin') {
            return;
        }

        /* @var RedirectInterface $redirect */
        foreach ($redirects->sorted() as $redirect) {

            if (!starts_with($parsed = $redirect->getFrom(), ['http://', 'https://', '//'])) {
                $parsed = $url->to($redirect->getFrom());
            }

            $parsed = parse_url(
                preg_replace_callback(
                    "/\{[a-z]+\?\}/",
                    function ($matches) {
                        return str_replace('?', '!', $matches[0]);
                    },
                    $parsed
                )
            );

            if (isset($parsed['host']) && $parsed['host'] == $request->getHost()) {

                /**
                 * Route a domain redirect in a domain group.
                 */
                $router->group(
                    ['domain' => $parsed['host']],
                    function () use ($parsed, $router, $redirect) {

                        $path = ltrim(
                            preg_replace_callback(
                                "/\{[a-z]+\!\}/",
                                function ($matches) {
                                    return str_replace('!', '?', $matches[0]);
                                },
                                $parsed['path']
                            ),
                            '/'
                        );

                        $router->any(
                            $path ?: '/',
                            [
                                'uses'     => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                                'redirect' => $redirect->getId()
                            ]
                        )->where(
                            [
                                'any'  => '(.*)',
                                'path' => '(.*)'
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
                        'uses'     => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                        'redirect' => $redirect->getId()
                    ]
                )->where(
                    [
                        'any'  => '(.*)',
                        'path' => '(.*)'
                    ]
                );
            }
        }
    }
}
