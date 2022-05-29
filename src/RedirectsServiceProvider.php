<?php

namespace Streams\Redirects;

use Illuminate\Support\ServiceProvider;
use Anomaly\RedirectsModule\Http\Middleware\RedirectDomains;

class RedirectsServiceProvider extends ServiceProvider
{
    protected $middleware = [
        RedirectDomains::class,
    ];
}
