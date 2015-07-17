<?php namespace Anomaly\RedirectsModule\Redirect;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class RedirectRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect
 */
class RedirectRepository extends EntryRepository implements RedirectRepositoryInterface
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
}
