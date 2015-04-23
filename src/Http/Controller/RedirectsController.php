<?php namespace Anomaly\RedirectsModule\Http\Controller;

use Anomaly\RedirectsModule\Redirect\Command\GetRedirectResponse;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Response;

/**
 * Class RedirectsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Http\Controller
 */
class RedirectsController extends PublicController
{

    /**
     * Map the matched route action to a redirect response.
     *
     * @param string $method
     * @param array  $parameters
     * @return Response
     */
    public function __call($method, $parameters)
    {
        return $this->dispatch(new GetRedirectResponse(substr($method, strpos($method, '_') + 1)));
    }
}
