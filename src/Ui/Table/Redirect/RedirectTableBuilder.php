<?php namespace Anomaly\RedirectsModule\Ui\Table\Redirect;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RedirectTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Ui\Table\Redirect
 */
class RedirectTableBuilder extends TableBuilder
{

    /**
     * The table model for fetching entries.
     *
     * @var string
     */
    protected $model = 'Anomaly\RedirectsModule\Redirect\RedirectModel';

    /**
     * The table columns.
     *
     * @var string
     */
    protected $columns = 'Anomaly\RedirectsModule\Ui\Table\Redirect\Handler\ColumnHandler@handle';

    /**
     * The table buttons.
     *
     * @var string
     */
    protected $buttons = 'Anomaly\RedirectsModule\Ui\Table\Redirect\Handler\ButtonHandler@handle';
}
