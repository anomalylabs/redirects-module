<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleRedirects_1_0_0_CreateRedirectsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleRedirects_1_0_0_CreateRedirectsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'from'   => 'anomaly.field_type.text',
        'to'     => 'anomaly.field_type.text',
        'status' => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'options' => [
                    '301' => 'anomaly.module.redirects::field.status.option.301',
                    '302' => 'anomaly.module.redirects::field.status.option.302'
                ]
            ]
        ],
        'secure' => [
            'type' => 'anomaly.field_type.boolean'
        ]
    ];

}
