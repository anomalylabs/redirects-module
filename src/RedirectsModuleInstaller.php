<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class RedirectsModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule
 */
class RedirectsModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\RedirectsModule\Installer\RedirectsFieldInstaller',
        'Anomaly\RedirectsModule\Installer\RedirectsStreamInstaller'
    ];

}
