<?php namespace Anomaly\RedirectsModule\Http\Controller;

use Anomaly\RedirectsModule\Ui\Form\Redirect\RedirectFormBuilder;
use Anomaly\RedirectsModule\Ui\Table\Redirect\RedirectTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class RedirectsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Http\Controller
 */
class RedirectsController extends AdminController
{

    /**
     * Display an index of existing redirects.
     *
     * @param RedirectTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(RedirectTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new redirect.
     *
     * @param RedirectFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(RedirectFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing redirect.
     *
     * @param RedirectFormBuilder $form
     * @param                     $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(RedirectFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
