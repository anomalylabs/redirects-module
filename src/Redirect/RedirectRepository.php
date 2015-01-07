<?php namespace Anomaly\RedirectsModule\Redirect;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;

/**
 * Class RedirectRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect
 */
class RedirectRepository implements RedirectRepositoryInterface
{

    /**
     * The redirect model.
     *
     * @var RedirectModel
     */
    protected $model;

    /**
     * Create a new RedirectRepository instance.
     *
     * @param RedirectModel $model
     */
    public function __construct(RedirectModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all redirects.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Delete a redirect.
     *
     * @param $id
     * @return \Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface
     */
    public function delete($id)
    {
        $redirect = $this->model->find($id);

        $redirect->delete();

        return $redirect;
    }
}
