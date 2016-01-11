<?php namespace Anomaly\RedirectsModule\Redirect;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\Streams\Platform\Support\Parser;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class RedirectResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect
 */
class RedirectResponse
{

    /**
     * The URL generator.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * The route instance.
     *
     * @var Route
     */
    protected $route;

    /**
     * The parser utility.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * The redirector utility.
     *
     * @var Redirector
     */
    protected $redirector;

    /**
     * Create a new RedirectResponse instance.
     *
     * @param UrlGenerator $url
     * @param Route        $route
     * @param Parser       $parser
     * @param Redirector   $redirector
     */
    function __construct(UrlGenerator $url, Route $route, Parser $parser, Redirector $redirector)
    {
        $this->url        = $url;
        $this->route      = $route;
        $this->parser     = $parser;
        $this->redirector = $redirector;
    }

    /**
     * Create a new Redirect response.
     *
     * @param RedirectInterface $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(RedirectInterface $redirect)
    {
        $parameters = array_merge(
            array_map(
                function () {
                    return null;
                },
                array_flip($this->route->parameterNames())
            ),
            $this->route->parameters()
        );

        if (!starts_with($url = $redirect->getTo(), ['http://', 'https://', '//'])) {
            $url = $this->url->to($redirect->getTo(), [], $redirect->isSecure());
        }

        return $this->redirector->to(
            $this->parser->parse($url, $parameters),
            $redirect->getStatus()
        );
    }
}
