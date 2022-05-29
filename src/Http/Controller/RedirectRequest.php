<?php namespace Streams\Redirects\Http\Controller;

use Illuminate\Routing\Controller;

class RedirectRequest extends Controller
{
    public function __invoke()
    {
        dd('Test!');
    }
}
