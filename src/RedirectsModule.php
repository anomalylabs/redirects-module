<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class RedirectsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule
 */
class RedirectsModule extends Module
{

    /**
     * The module navigation group.
     *
     * @var string
     */
    protected $navigation = 'streams::navigation.structure';

    /**
     * The module's sections.
     *
     * @var array
     */
    protected $sections = [
        'redirects',
    ];
}
