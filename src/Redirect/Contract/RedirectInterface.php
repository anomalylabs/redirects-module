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
     * @return string
     */
    public function getFrom();

    /**
     * Get the redirect to path.
     *
     * @return string
     */
    public function getTo();

    /**
     * Get the redirect status.
     *
     * @return string
     */
    public function getStatus();

    /**
     * Return the secure flag.
     *
     * @return bool
     */
    public function isSecure();
}
