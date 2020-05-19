<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Blog\Controllers;

use ShukkaiKei\Models\Blog\Feedbacks;

class FeedbacksController extends ControllerBase
{

    public function createAction()
    {
        $request = $this->request->getPost();

        $new_feedbacks = new Feedbacks();
        $new_feedbacks->name = $request['name'];
        $new_feedbacks->email = $request['email'];
        $new_feedbacks->phone = $request['phone'];
        $new_feedbacks->content = $request['content'];
        $success = $new_feedbacks->save();

        // if ($success) {
        //     alert('New comment successfully added');
        // } else {
        //     alert('Failed to add new comment');
        // }
        $this->response->redirect('/Blog/index/contact');
    }

}
