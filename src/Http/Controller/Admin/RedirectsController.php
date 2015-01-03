<?php namespace Anomaly\RedirectsModule\Http\Controller\Admin;

use Anomaly\RedirectsModule\Ui\Table\RedirectTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class RedirectsController extends AdminController
{

    public function index(RedirectTableBuilder $table)
    {
        return $table->render();
    }
}
 