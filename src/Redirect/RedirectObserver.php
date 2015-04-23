<?php namespace Anomaly\RedirectsModule\Redirect;

use Anomaly\RedirectsModule\Redirect\Command\GenerateRoutesFile;
use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class RedirectObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect
 */
class RedirectObserver extends EntryObserver
{

    /**
     * Fired after a redirect is saved.
     *
     * @param EntryInterface|RedirectInterface $entry
     */
    public function saved(EntryInterface $entry)
    {
        $this->commands->dispatch(new GenerateRoutesFile());

        parent::saved($entry);
    }

    /**
     * Fired after a redirect is deleted.
     *
     * @param EntryInterface|RedirectInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new GenerateRoutesFile());

        parent::deleted($entry);
    }
}
