<?php namespace Anomaly\RedirectsModule\Domain\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class DomainTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DomainTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'columns' => [
                'to',
                'from',
            ],
        ],
        'status',
    ];

    /**
     * The table columns.
     *
     * @var string
     */
    protected $columns = [
        'status',
        'from',
        'to',
        'entry.secure.label',
    ];

    /**
     * The table buttons.
     *
     * @var string
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'limit'    => 999,
        'sortable' => true,
    ];

}
