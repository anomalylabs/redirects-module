<?php namespace Anomaly\RedirectsModule\Ui\Table\Redirect\Handler;

/**
 * Class ButtonHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Ui\Table\Redirect\Handler
 */
class ButtonHandler
{

    /**
     * Return the table buttons.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'edit',
            'delete'
        ];
    }
}
