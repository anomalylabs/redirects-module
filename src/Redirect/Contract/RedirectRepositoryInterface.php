<?php namespace Anomaly\RedirectsModule\Redirect\Contract;

/**
 * Interface RedirectRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Contract
 */
interface RedirectRepositoryInterface
{

    /**
     * Find a redirect by ID.
     *
     * @param $id
     * @return null|RedirectInterface
     */
    public function find($id);

    /**
     * Return all redirects.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all();
}
