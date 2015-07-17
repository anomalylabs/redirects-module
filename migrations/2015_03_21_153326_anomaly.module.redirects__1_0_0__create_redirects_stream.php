<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleRedirects_1_0_0_CreateRedirectsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleRedirects_1_0_0_CreateRedirectsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var string
     */
    protected $stream = [
        'slug'         => 'redirects',
        'title_column' => 'from'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'from'   => [
            'unique'   => true,
            'required' => true
        ],
        'to'     => [
            'required' => true
        ],
        'status' => [
            'required' => true
        ],
        'secure'
    ];

}
