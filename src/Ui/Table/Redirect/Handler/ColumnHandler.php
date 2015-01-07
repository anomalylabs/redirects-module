<?php namespace Anomaly\RedirectsModule\Ui\Table\Redirect\Handler;

/**
 * Class ColumnHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Ui\Table\Redirect\Handler
 */
class ColumnHandler
{

    /**
     * Return the table columns.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'status',
            'from',
            'to'
        ];
    }
}
