<?php namespace Anomaly\RedirectsModule\Redirect\Command;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\Streams\Platform\Support\Parser;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class GetRedirectResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Command
 */
class GetRedirectResponse implements SelfHandling
{

    /**
     * The redirect ID.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new GetRedirectResponse instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Handle the command.
     *
     * @param RedirectRepositoryInterface $redirects
     * @param Redirector                  $redirector
     * @param Parser                      $parser
     * @param Route                       $route
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(
        RedirectRepositoryInterface $redirects,
        Redirector $redirector,
        Parser $parser,
        Route $route
    ) {
        $redirect = $redirects->find($this->id);

        $parameters = array_merge(
            array_map(
                function () {
                    return null;
                },
                array_flip($route->parameterNames())
            ),
            $route->parameters()
        );

        return $redirector->to(
            $parser->parse($redirect->getTo(), $parameters),
            $redirect->getStatus(),
            [],
            $redirect->isSecure()
        );
    }
}
