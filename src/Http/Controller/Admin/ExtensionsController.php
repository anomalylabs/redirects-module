<?php namespace Anomaly\RedirectsModule\Http\Controller\Admin;

use Anomaly\RedirectsModule\Ui\Table\ExtensionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ExtensionsController extends AdminController
{

    public function index(ExtensionTableBuilder $table)
    {
        return $table->render();
    }
}
 