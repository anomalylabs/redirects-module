<?php namespace Anomaly\RedirectsModule\Redirect;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Support\ServiceProvider;

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

    use DispatchesCommands;

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
        //$this->execute('Anomaly\RedirectsModule\Redirect\Command\RegisterRedirectsCommand');
    }

    /**
     * Bind the redirect interfaces.
     */
    protected function bindInterfaces()
    {
        $this->app->bind(
            'Anomaly\RedirectsModule\Redirect\RedirectModel',
            config('anomaly.module.redirects::config.redirects.model')
        );
        $this->app->bind(
            'Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface',
            config('anomaly.module.redirects::config.redirects.repository')
        );
    }
}
 