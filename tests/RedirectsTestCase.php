<?php

namespace Streams\Redirects\Tests;

use Streams\Testing\TestCase;
use Illuminate\Support\Facades\Route;
use Streams\Core\Support\Facades\Streams;
use Streams\Redirects\RedirectsServiceProvider;
use Streams\Redirects\Http\Controller\RedirectRequest;


abstract class RedirectsTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Route::fallback(RedirectRequest::class);
        
        Route::any('/redirect-test', fn () => 'Hi');

        Streams::load(__DIR__ . '/../resources/streams/redirects.json');
        Streams::load(__DIR__ . '/../resources/streams/domains.json');

        Streams::extend('redirects', [
            'config' => [
                'source' => [
                    'type' => 'file',
                    'file' => __DIR__ . '/redirects.json'
                ]
            ]
        ]);

        Streams::extend('domains', [
            'config' => [
                'source' => [
                    'type' => 'file',
                    'file' => __DIR__ . '/domains.json'
                ]
            ]
        ]);
    }
    
    protected function getPackageProviders($app)
    {
        return [RedirectsServiceProvider::class];
    }
}
