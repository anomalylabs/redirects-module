<?php namespace Streams\Redirects\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Streams\Core\Support\Facades\Streams;

class RedirectDomains
{
    public function handle(Request $request, \Closure $next)
    {
        $host = $request->getHost();

        $domain = Streams::entries('domains')->where('from', $host)->first();
        
        if ($domain) {

            $protocol = $domain->secure ? 'https://' : 'http://';

            return Redirect::to($protocol . $domain->to, $domain->type);
        }
        
        return $next($request);
    }
}
