<?php namespace Anomaly\RedirectsModule\Ui\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class RedirectTableBuilder extends TableBuilder
{

    protected $model = 'Anomaly\RedirectsModule\Redirect\RedirectModel';

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
 