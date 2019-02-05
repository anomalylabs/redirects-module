<?php namespace Anomaly\RedirectsModule\Domain\Command;

/**
 * Class DumpDomains
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DumpDomains
{

    /**
     * Handle the command.
     */
    public function handle()
    {
        if (file_exists($file = base_path('bootstrap/cache/domains.php'))) {
            return;
        };

        $content = join(
            ",",
            array_map(
                function ($domain) {
                    return "'{$domain}'";
                },
                array_keys(cache('anomaly.module.redirects::domains.array', []))
            )
        );

        file_put_contents($file, "<?php\n\n return [$content];");
    }
}
