<?php namespace Anomaly\RedirectsModule;

use Anomaly\RedirectsModule\Domain\Command\CacheDomains;
use Anomaly\RedirectsModule\Domain\Contract\DomainRepositoryInterface;
use Anomaly\RedirectsModule\Domain\DomainModel;
use Anomaly\RedirectsModule\Domain\DomainRepository;
use Anomaly\RedirectsModule\Http\Middleware\RedirectDomains;
use Anomaly\RedirectsModule\Redirect\Command\DumpRedirects;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\RedirectsModule\Redirect\RedirectModel;
use Anomaly\RedirectsModule\Redirect\RedirectRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Redirects\RedirectsDomainsEntryModel;
use Anomaly\Streams\Platform\Model\Redirects\RedirectsRedirectsEntryModel;

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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/redirects'                   => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@index',
        'admin/redirects/create'            => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@create',
        'admin/redirects/edit/{id}'         => 'Anomaly\RedirectsModule\Http\Controller\Admin\RedirectsController@edit',
        'admin/redirects/domains'           => 'Anomaly\RedirectsModule\Http\Controller\Admin\DomainsController@index',
        'admin/redirects/domains/create'    => 'Anomaly\RedirectsModule\Http\Controller\Admin\DomainsController@create',
        'admin/redirects/domains/edit/{id}' => 'Anomaly\RedirectsModule\Http\Controller\Admin\DomainsController@edit',
    ];

    /**
     * Boot the addon.
     */
    public function boot()
    {
        dispatch_now(new CacheDomains());
        dispatch_now(new DumpRedirects());
    }

    /**
     * Load additional routes.
     */
    public function map()
    {
        require app_storage_path('redirects/routes.php');
    }

}
