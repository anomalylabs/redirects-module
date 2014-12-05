<?php namespace Anomaly\Streams\Addon\Module\Redirects;

class RedirectsModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'RedirectsFieldInstaller',
        'RedirectsStreamInstaller',
    ];
}
 