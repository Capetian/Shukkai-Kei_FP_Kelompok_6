<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Blog\Controllers;


class BlogController extends ControllerBase
{

    public function indexAction()
    {
        $phql = "SELECT * FROM ShukkaiKei\Models\Blog\Posts WHERE active = 1";

        $records = $this->modelsManager->executeQuery($phql);
        $this->view->setVar('records', $records);
    }

    public function showAction($id)
    {
        $phql = "SELECT * FROM ShukkaiKei\Models\Blog\Posts WHERE id = :id: AND active = 1";

        $records = $this->modelsManager->executeQuery($phql, ['id' => $id]);

        $comment_phql = "SELECT * FROM ShukkaiKei\Models\Blog\Comments WHERE post_id = :id:";

        $comments = $this->modelsManager->executeQuery($comment_phql, ['id' => $id]);

        $this->view->setVar('records', $records);
        $this->view->setVar('comments', $comments);
    }
}
