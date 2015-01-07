<?php namespace Anomaly\RedirectsModule\Redirect;

use Illuminate\Support\ServiceProvider;
use Laracasts\Commander\CommanderTrait;

/**
 * Class RedirectServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect
 */
class RedirectServiceProvider extends ServiceProvider
{

    use CommanderTrait;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bindInterfaces();
        $this->registerRedirects();
    }

    /**
     * Register module redirects.
     */
    protected function registerRedirects()
    {
        $this->execute('Anomaly\RedirectsModule\Redirect\Command\RegisterRedirectsCommand');
    }

    /**
     * Bind the redirect interfaces.
     */
    protected function bindInterfaces()
    {
        $this->app->bind(
            'Anomaly\RedirectsModule\Redirect\RedirectModel',
            'Anomaly\RedirectsModule\Redirect\RedirectModel'
        );
        $this->app->bind(
            'Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface',
            'Anomaly\RedirectsModule\Redirect\RedirectRepository'
        );
    }
}
 