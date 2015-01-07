<?php namespace Anomaly\RedirectsModule\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class RedirectsFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Installer
 */
class RedirectsFieldInstaller extends FieldInstaller
{

    /**
     * The field configurations.
     *
     * @var array
     */
    protected $fields = [
        'from'   => 'text',
        'to'     => 'text',
        'status' => [
            'type'   => 'select',
            'config' => [
                'options' => [
                    '301' => 'anomaly.module.redirects::field.status.option.301',
                    '302' => 'anomaly.module.redirects::field.status.option.302'
                ]
            ]
        ],
        'secure' => [
            'type' => 'boolean'
        ]
    ];
}
