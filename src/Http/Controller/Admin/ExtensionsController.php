<?php namespace Anomaly\Streams\Addon\Module\Redirects\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Redirects\Ui\Table\ExtensionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ExtensionsController extends AdminController
{

    public function index(ExtensionTableBuilder $table)
    {
        return $table->render();
    }
}
 