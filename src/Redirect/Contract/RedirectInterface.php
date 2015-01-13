<?php namespace Anomaly\RedirectsModule\Redirect\Contract;

    /**
     * Interface RedirectInterface
     *
     * @link          http://anomaly.is/streams-platform
     * @author        AnomalyLabs, Inc. <hello@anomaly.is>
     * @author        Ryan Thompson <ryan@anomaly.is>
     * @package       Anomaly\RedirectsModule\Redirect\Contract
     */
/**
 * Interface RedirectInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Contract
 */
interface RedirectInterface
{

    /**
     * Get the redirect from matcher.
     *
     * @return mixed
     */
    public function getFrom();

    /**
     * Get the redirect to path.
     *
     * @return mixed
     */
    public function getTo();

    /**
     * Get the redirect status.
     *
     * @return mixed
     */
    public function getStatus();

    /**
     * Return whether the redirect is secure or not.
     *
     * @return mixed
     */
    public function isSecure();
}
