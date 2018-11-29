<?php namespace Anomaly\RedirectsModule;

use Anomaly\RedirectsModule\Domain\Contract\DomainRepositoryInterface;
use Anomaly\RedirectsModule\Domain\DomainModel;
use Anomaly\RedirectsModule\Domain\DomainRepository;
use Anomaly\RedirectsModule\Http\Middleware\RedirectDomains;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\RedirectsModule\Redirect\RedirectModel;
use Anomaly\RedirectsModule\Redirect\RedirectRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Redirects\RedirectsDomainsEntryModel;
use Anomaly\Streams\Platform\Model\Redirects\RedirectsRedirectsEntryModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**
 * Class RedirectsModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class RedirectsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon middleware.
     *
     * @var array
     */
    protected $middleware = [
        RedirectDomains::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/redirects/domains'           => 'Anomaly\RedirectsModule\Http\Controller\Admin\DomainsController@index',
        'admin/redirects/domains/create'    => 'Anomaly\RedirectsModule\Http\Controller\Admin\DomainsController@create',
        'admin/redirects/domains/edit/{id}' => 'Anomaly\RedirectsModule\Http\Controller\Admin\DomainsController@edit',
        'admin/redirects'                   => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@index',
        'admin/redirects/create'            => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@create',
        'admin/redirects/edit/{id}'         => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@edit',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        RedirectsDomainsEntryModel::class   => DomainModel::class,
        RedirectsRedirectsEntryModel::class => RedirectModel::class,
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        DomainRepositoryInterface::class   => DomainRepository::class,
        RedirectRepositoryInterface::class => RedirectRepository::class,
    ];

    /**
     * Map the redirect routes.
     *
     * @param Router $router
     * @param Request $request
     * @param RedirectRepositoryInterface $redirects
     */
    public function map(
        Router $router,
        Request $request,
        RedirectRepositoryInterface $redirects
    ) {

        /* @var RedirectInterface $redirect */
        foreach ($redirects->sorted() as $redirect) {

            $parsed = parse_url(str_replace('?}', '!}', $redirect->getFrom()));

            $parsed['path'] = str_replace('!}', '?}', array_get($parsed, 'path'));

            if (isset($parsed['host']) && $request->getHost() == $parsed['host']) {

                /*
                 * Route a domain redirect in a domain group.
                 */
                $router->any(
                    array_get($parsed, 'path', '{any?}'),
                    [
                        'uses'     => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                        'redirect' => $redirect->getId(),
                    ]
                )->where(
                    [
                        'any'  => '(.*)',
                        'path' => '(.*)',
                    ]
                );
            } else {

                /*
                 * Route a standard redirect.
                 */
                $router->any(
                    $redirect->getFrom(),
                    [
                        'uses'     => 'Anomaly\RedirectsModule\Http\Controller\RedirectsController@handle',
                        'redirect' => $redirect->getId(),
                    ]
                )->where(
                    [
                        'any'  => '(.*)',
                        'path' => '(.*)',
                    ]
                );
            }
        }
    }
}
