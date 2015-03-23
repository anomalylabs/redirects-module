<?php namespace Anomaly\RedirectsModule\Redirect\Listener;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class Redirect
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Listener
 */
class Redirect
{

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The redirect repository.
     *
     * @var RedirectRepositoryInterface
     */
    protected $redirects;

    /**
     * The redirect utility.
     *
     * @var Redirector
     */
    protected $redirector;

    /**
     * Create a new Redirect instance.
     *
     * @param Request                     $request
     * @param RedirectRepositoryInterface $redirects
     * @param Redirector                  $redirector
     */
    public function __construct(Request $request, RedirectRepositoryInterface $redirects, Redirector $redirector)
    {
        $this->request    = $request;
        $this->redirects  = $redirects;
        $this->redirector = $redirector;
    }

    /**
     * Handle the event.
     *
     * @return Redirector
     */
    public function handle()
    {
        $redirects = $this->redirects->all();

        /* @var RedirectInterface $redirect */
        foreach ($redirects as $redirect) {

            /**
             * Check if it's a direct match.
             */
            if ($redirect->getFrom() === $this->request->path()) {
                return $this->redirector->to($redirect->getTo(), $redirect->getStatus(), [], $redirect->isSecure());
            }

            /**
             * Check if it has a back reference.
             */
            try {
                if (starts_with($redirect->getFrom(), '/') && preg_match(
                        $redirect->getFrom(),
                        $this->request->path()
                    )
                ) {
                    return $this->redirector->to(
                        preg_replace($redirect->getFrom(), $redirect->getTo(), $this->request->path()),
                        $redirect->getStatus(),
                        [],
                        $redirect->isSecure()
                    );
                }
            } catch (\Exception $e) {
                // Move along.
            }
        }
    }
}
