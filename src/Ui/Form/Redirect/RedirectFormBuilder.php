<?php namespace Anomaly\RedirectsModule\Ui\Form\Redirect;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RedirectFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Ui\Form\Redirect
 */
class RedirectFormBuilder extends FormBuilder
{

    /**
     * The form model for fetching/saving the entry.
     *
     * @var string
     */
    protected $model = 'Anomaly\RedirectsModule\Redirect\RedirectModel';

}
