<?php namespace Anomaly\RedirectsModule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class RedirectDomains
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RedirectDomains
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $domains = cache('anomaly.module.redirects::domains.array');

        if ($redirect = array_get($domains, $_SERVER['HTTP_HOST'])) {
            return redirect('http://' . $redirect['to'], $redirect['status'], [], ($redirect['secure']));
        }

        return $next($request);
    }
}
