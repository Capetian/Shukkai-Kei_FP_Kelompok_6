<?php

declare(strict_types=1);
namespace ShukkaiKei\Modules\Blog\Controllers;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $phql = "SELECT * FROM ShukkaiKei\Models\Blog\Posts WHERE active = 1 ORDER BY id DESC LIMIT 5";

        $records = $this->modelsManager->executeQuery($phql);
        $this->view->setVar('records', $records);
    }

    public function aboutAction()
    {
    }

    public function contactAction()
    {
    }
}
