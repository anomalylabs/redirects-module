<?php namespace Anomaly\RedirectsModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class RedirectsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Installer
 */
class RedirectsStreamInstaller extends StreamInstaller
{

    /**
     * The stream configuration.
     *
     * @var string
     */
    protected $stream = 'redirects';

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'from',
        'to',
        'status',
        'secure'
    ];
}
