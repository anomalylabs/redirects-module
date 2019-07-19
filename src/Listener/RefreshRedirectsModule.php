<?php namespace Anomaly\RedirectsModule\Listener;

use Anomaly\Streams\Platform\Application\Event\SystemIsRefreshing;

/**
 * Class RefreshRedirectsModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RefreshRedirectsModule
{

    /**
     * Handle the event.
     *
     * @param SystemIsRefreshing $event
     */
    public function handle(SystemIsRefreshing $event)
    {
        $command = $event->getCommand();

        $command->call('redirects:dump');
    }
}
