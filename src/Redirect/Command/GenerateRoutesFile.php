<?php namespace Anomaly\RedirectsModule\Redirect\Command;

use Anomaly\RedirectsModule\Redirect\Contract\RedirectRepositoryInterface;
use Anomaly\RedirectsModule\RedirectsModule;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class GenerateRoutesFile
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\RedirectsModule\Redirect\Command
 */
class GenerateRoutesFile implements SelfHandling
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
                    'redirects' => $redirects->all()
                ]
            )
        );
    }
}
