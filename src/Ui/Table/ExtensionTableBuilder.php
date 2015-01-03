<?php namespace Anomaly\RedirectsModule\Ui\Table;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class ExtensionTableBuilder extends TableBuilder
{

    function __construct(Table $table)
    {
        $this->setTableColumns();
        $this->setTableEntries($table);

        parent::__construct($table);
    }

    protected function setTableColumns()
    {
        $this->setColumns(
            [
                [
                    'header' => 'Name',
                    'value'  => function (Extension $entry) {
                            return $entry->getName();
                        }
                ]
            ]
        );
    }

    protected function setTableEntries(Table $table)
    {
        $redirects = app('streams.extensions')->search('module.redirects::redirect.*');

        $table->setEntries($redirects);
    }
}
 