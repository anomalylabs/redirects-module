<?php namespace Anomaly\RedirectsModule\Domain\Command;

use Anomaly\RedirectsModule\Domain\Contract\DomainRepositoryInterface;

/**
 * Class CacheDomains
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CacheDomains
{

    /**
     * Handle the command.
     *
     * @param DomainRepositoryInterface $domains
     */
    public function handle(DomainRepositoryInterface $domains)
    {
        $domains->cache(
            'anomaly.module.redirects::domains.array',
            function () use ($domains) {

                $collection = $domains->all();

                return array_combine(
                    $collection->pluck('from')->all(),
                    $collection->toArray()
                );
            }
        );
    }

}
