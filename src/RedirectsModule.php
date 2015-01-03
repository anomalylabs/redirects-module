<?php namespace Anomaly\RedirectsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class RedirectsModule extends Module
{

    /**
     * The module navigation role.
     *
     * @var string
     */
    protected $navigation = 'streams::navigation.structure';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'redirects'  => [
            'url'     => 'admin/redirects',
            'buttons' => [
                'create' => []
            ]
        ],
        'extensions' => [
            'url'     => 'admin/redirects/extensions',
        ],
    ];
}
