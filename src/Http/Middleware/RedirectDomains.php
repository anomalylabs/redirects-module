<?php namespace Anomaly\RedirectsModule\Http\Middleware;

use Anomaly\RedirectsModule\Domain\Contract\DomainInterface;
use Anomaly\RedirectsModule\Domain\Contract\DomainRepositoryInterface;
use Closure;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class RedirectDomains
 *
 * This class replaces the Laravel version in app/
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class RedirectDomains
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The redirector utility.
     *
     * @var Redirector
     */
    protected $redirect;

    /**
     * The domain repository.
     *
     * @var DomainRepositoryInterface
     */
    protected $domains;

    /**
     * Create a new RedirectDomainsRequest instance.
     *
     * @param Repository $config
     * @param Redirector $redirect
     * @param DomainRepositoryInterface $domains
     */
    public function __construct(
        Repository $config,
        Redirector $redirect,
        DomainRepositoryInterface $domains
    ) {
        $this->config   = $config;
        $this->redirect = $redirect;
        $this->domains  = $domains;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $original = $request->getHttpHost();

        /* @var DomainInterface $domain */
        if (!$domain = $this->domains->findBy('from', $original)) {
            return $next($request);
        }

        if ($destination = $domain->getTo()) {

            $protocol = $domain->isSecure() ? 'https' : 'http';

            return $this->redirect->to(
                $protocol . '://' . $destination . $request->getRequestUri(),
                $domain->getStatus()
            );
        }

        $protocol    = $domain->isSecure() ? 'https' : 'http';
        $destination = $this->config->get('streams::system.domain');

        if ($this->config->get('streams::system.force_ssl')) {
            $protocol = 'https';
        }

        return $this->redirect->to(
            $protocol . '://' . $destination . $request->getRequestUri(),
            $domain->getStatus()
        );
    }
}
