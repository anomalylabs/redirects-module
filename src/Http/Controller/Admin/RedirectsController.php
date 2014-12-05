<?php namespace Anomaly\Streams\Addon\Module\Redirects\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Redirects\Ui\Table\RedirectsTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class RedirectsController extends AdminController
{

    public function index(RedirectsTableBuilder $table)
    {
        return $table->render();
    }
}
 