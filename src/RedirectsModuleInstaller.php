<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

class RedirectsModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\RedirectsModule\Installer\RedirectsFieldInstaller',
        'Anomaly\RedirectsModule\Installer\RedirectsStreamInstaller',
    ];
}
 