<?php namespace Streams\Redirects\Tests\Http\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Streams\Redirects\Tests\RedirectsTestCase;
use Streams\Redirects\Http\Middleware\RedirectDomains;

class RedirectRequestTest extends RedirectsTestCase
{
    public function test_it_redirects_exact_matches()
    {
        $response = $this->get('/redirect-test');

        $response->assertRedirect('/redirect-works');
    }
}
