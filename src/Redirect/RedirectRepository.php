<?php namespace Anomaly\RedirectsModule\Redirect;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface;
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
     * Find a redirect by ID.
     *
     * @param $id
     * @return null|RedirectInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
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
}
