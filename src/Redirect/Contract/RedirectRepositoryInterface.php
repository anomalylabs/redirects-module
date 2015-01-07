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
     * Return all redirects.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all();

    /**
     * Delete a redirect.
     *
     * @param $id
     * @return \Anomaly\RedirectsModule\Redirect\Contract\RedirectInterface
     */
    public function delete($id);
}
