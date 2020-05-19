<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Blog\Controllers;

use ShukkaiKei\Models\Blog\Users;
use ShukkaiKei\Models\Blog\Comments;

class CommentsController extends ControllerBase
{


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

}
