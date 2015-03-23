<?php namespace Anomaly\RedirectsModule\Http\Controller;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\RedirectsModule\Redirect\Form\RedirectFormBuilder;
use Anomaly\RedirectsModule\Redirect\Table\RedirectTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Routing\Redirector;

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

    /**
     * Delete a redirect.
     *
     * @param RedirectRepositoryInterface $redirects
     * @param Redirector                  $redirector
     * @param                             $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(RedirectRepositoryInterface $redirects, Redirector $redirector, $id)
    {
        $redirects->delete($id);

        return $redirector->back();
    }
}
