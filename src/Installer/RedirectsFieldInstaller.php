<?php namespace Anomaly\Streams\Addon\Module\Redirects\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

class RedirectsFieldInstaller extends FieldInstaller
{

    /**
     * Stream fields to install.
     *
     * @var array
     */
    protected $fields = [
        'type' => [
            'type'   => 'select',
            'config' => [
                'options' => [
                    '301',
                    '302',
                ],
            ]
        ],
        'from',
        'to',
    ];
}
 