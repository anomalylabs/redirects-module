<?php namespace Anomaly\RedirectsModule\Redirect\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RedirectTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Table
 */
class RedirectTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'from',
        'to'
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
        'entry.secure.icon'
    ];

    /**
     * The table buttons.
     *
     * @var string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => true
    ];

}
