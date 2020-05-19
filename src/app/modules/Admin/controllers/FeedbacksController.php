<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Admin\Controllers;

use ShukkaiKei\Models\Blog\Feedbacks;

class FeedbacksController extends ControllerBase
{

    public function indexAction()
    {
        $phql = "SELECT * FROM ShukkaiKei\Models\Blog\Feedbacks";

        $records = $this->modelsManager->executeQuery($phql);
        $this->view->setVar('records', $records);

        $this->view->pick('feedbacks/index');
    }


    public function deleteAction($id)
    {

        $phql = "DELETE FROM ShukkaiKei\Models\Blog\Feedbacks WHERE id = :id:";
        $record = $this->modelsManager->executeQuery($phql, ['id' => $id]);

        if ($record) {
            $this->flashSession->success('Feedback successfully deleted');
        } else {
            $this->flashSession->error('Failed to delete feedback');
        }
        $this->response->redirect('/Admin/feedbacks');
    }
}
