<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Blog\Controllers;

use ShukkaiKei\Modules\Blog\Models\Users;
use ShukkaiKei\Modules\Blog\Models\Comments;

class CommentsController extends ControllerBase
{

    public function indexAction()
    {
        $phql = "SELECT Comments.*, Posts.* FROM ShukkaiKei\Modules\Blog\Models\Comments Comments INNER JOIN ShukkaiKei\Modules\Blog\Models\Posts Posts ON Comments.post_id = Posts.id";

        $records = $this->modelsManager->executeQuery($phql);
        $this->view->setVar('records', $records);
        // var_dump($records[0]['Comments']);

        $this->view->pick('dashboard/comments/index');
    }

    public function createAction()
    {
        $request = $this->request->getPost();

        $current_user = Users::findFirst([
            'conditions' => 'username = :username:',
            'bind' => [
                'username' => $this->session->get('auth')['username']

            ],
        ]);

        $new_comment = new Comments();
        $new_comment->post_id = $request['post_id'];
        $new_comment->username = $current_user->username;
        $new_comment->content = $request['content'];
        $success = $new_comment->save();

        // if ($success) {
        //     alert('New comment successfully added');
        // } else {
        //     alert('Failed to add new comment');
        // }
        $this->response->redirect('/Blog/blog/show/' . $request['post_id']);
    }

    public function deleteAction($id)
    {

        $phql = "DELETE FROM ShukkaiKei\Modules\Blog\Models\Comments WHERE id = :id:";
        $record = $this->modelsManager->executeQuery($phql, ['id' => $id]);

        if ($record) {
            $this->flashSession->success('Comment successfully deleted');
        } else {
            $this->flashSession->error('Failed to delete comment');
        }
        $this->response->redirect('/Blog/comments');
    }
}
