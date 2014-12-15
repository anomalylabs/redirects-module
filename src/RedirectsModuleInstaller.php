<?php namespace Anomaly\Streams\Addon\Module\Redirects;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

class RedirectsModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\Streams\Addon\Module\Redirects\Installer\RedirectsFieldInstaller',
        'Anomaly\Streams\Addon\Module\Redirects\Installer\RedirectsStreamInstaller',
    ];
}
 