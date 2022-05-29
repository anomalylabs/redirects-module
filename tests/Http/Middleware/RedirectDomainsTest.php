<?php namespace Streams\Redirects\Tests\Http\Middleware;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Streams\Redirects\Tests\RedirectsTestCase;
use Streams\Redirects\Http\Middleware\RedirectDomains;

class RedirectDomainsTest extends RedirectsTestCase
{
    public function test_it_redirects_simple_paths()
    {
        $request = Request::create('/');

        $route = Route::getRoutes()->match($request);

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });

        $response = (new RedirectDomains)->handle($request, function ($request) {
            return $request;
        });

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame('http://example.com', $response->getTargetUrl());
    }
}
