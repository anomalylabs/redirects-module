<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleRedirectsCreateRedirectsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleRedirectsCreateRedirectsStream extends Migration
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
