<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Admin\Controllers;

use ShukkaiKei\Models\Blog\Comments;

class CommentsController extends ControllerBase
{

    public function indexAction()
    {
        $phql = "SELECT Comments.*, Posts.* FROM ShukkaiKei\Models\Blog\Comments Comments INNER JOIN ShukkaiKei\Models\Blog\Posts Posts ON Comments.post_id = Posts.id";

        $records = $this->modelsManager->executeQuery($phql);
        $this->view->setVar('records', $records);
        // var_dump($records[0]['Comments']);

        $this->view->pick('comments/index');
    }

    public function deleteAction($id)
    {

        $phql = "DELETE FROM ShukkaiKei\Models\Blog\Comments WHERE id = :id:";
        $record = $this->modelsManager->executeQuery($phql, ['id' => $id]);

        if ($record) {
            $this->flashSession->success('Comment successfully deleted');
        } else {
            $this->flashSession->error('Failed to delete comment');
        }
        $this->response->redirect('/Admin/comments');
    }
}
