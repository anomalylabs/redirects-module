<?php namespace Anomaly\RedirectsModule\Redirect\Command;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\RedirectsModule\RedirectsModule;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

/**
 * Class GenerateRoutesFile
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GenerateRoutesFile
{

    /**
     * Handle the command.
     *
     * @param RedirectRepositoryInterface $redirects
     * @param Application                 $application
     * @param RedirectsModule             $module
     * @param Filesystem                  $files
     */
    public function handle(
        RedirectRepositoryInterface $redirects,
        Application $application,
        RedirectsModule $module,
        Filesystem $files
    ) {
        $files->makeDirectory($application->getStoragePath('redirects'), 0777, true, true);

        $files->put(
            $application->getStoragePath('redirects/routes.php'),
            app('Anomaly\Streams\Platform\Support\String')->render(
                $files->get($module->getPath('resources/assets/routes.stub')),
                [
                    'redirects' => $redirects->all(),
                ]
            )
        );
    }
}
