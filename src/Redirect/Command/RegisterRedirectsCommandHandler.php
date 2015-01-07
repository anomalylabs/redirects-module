<?php namespace Anomaly\RedirectsModule\Redirect\Command;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;

/**
 * Class RegisterRedirectsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Command
 */
class RegisterRedirectsCommandHandler
{

    /**
     * The router.
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * The redirector.
     *
     * @var \Illuminate\Routing\Redirector
     */
    protected $redirector;

    /**
     * The redirects repository.
     *
     * @var \Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface
     */
    protected $redirects;

    /**
     * Create a new RegisterRedirectsCommandHandler instance.
     *
     * @param Router                      $router
     * @param Redirector                  $redirector
     * @param RedirectRepositoryInterface $redirects
     */
    public function __construct(Router $router, Redirector $redirector, RedirectRepositoryInterface $redirects)
    {
        $this->router     = $router;
        $this->redirects  = $redirects;
        $this->redirector = $redirector;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        foreach ($this->redirects->all() as $redirect) {
            $this->registerRedirect($redirect);
        }
    }

    /**
     * Register the redirect.
     *
     * @param RedirectInterface $redirect
     */
    protected function registerRedirect(RedirectInterface $redirect)
    {
        $this->router->get(
            $redirect->getFrom(),
            function () use ($redirect) {
                return $this->redirector->to($redirect->getTo());
            }
        );
    }
}
