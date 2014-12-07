<?php namespace Anomaly\Streams\Addon\Module\Redirects\Ui\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class RedirectTableBuilder extends TableBuilder
{

    protected $model = 'Anomaly\Streams\Addon\Module\Redirects\Redirect\RedirectModel';

    protected $filters = [
        'type',
        'from',
        'to',
    ];

    protected $columns = [
        'type',
        'from',
        'to',
    ];
}
 