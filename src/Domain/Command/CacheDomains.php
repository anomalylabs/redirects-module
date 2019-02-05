<?php namespace Anomaly\RedirectsModule\Domain\Command;

use Anomaly\RedirectsModule\Domain\Contract\DomainInterface;
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
        $domains->cacheForever(
            'anomaly.module.redirects::domains.array',
            function () use ($domains) {

                $collection = $domains->all();

                return array_combine(
                    array_map(
                        function (DomainInterface $domain) {
                            return $domain->getFrom();
                        },
                        $collection->all()
                    ),
                    $collection->toArray()
                );
            }
        );
    }

}
