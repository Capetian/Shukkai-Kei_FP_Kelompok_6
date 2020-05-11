<?php

declare(strict_types=1);
namespace ShukkaiKei\Modules\Blog\Controllers;


class DashboardController extends ControllerBase
{

    public function indexAction()
    {
        $posts_phql = "SELECT * FROM ShukkaiKei\Modules\Blog\Models\Posts";
        $users_phql = "SELECT * FROM ShukkaiKei\Modules\Blog\Models\Users";
        $comments_phql = "SELECT * FROM ShukkaiKei\Modules\Blog\Models\Comments";
        $feedbacks_phql = "SELECT * FROM ShukkaiKei\Modules\Blog\Models\Feedbacks";


        $posts = $this->modelsManager->executeQuery($posts_phql);
        $users = $this->modelsManager->executeQuery($users_phql);
        $comments = $this->modelsManager->executeQuery($comments_phql);
        $feedbacks = $this->modelsManager->executeQuery($feedbacks_phql);

        $this->view->setVar('posts', $posts);
        $this->view->setVar('users', $users);
        $this->view->setVar('comments', $comments);
        $this->view->setVar('feedbacks', $feedbacks);
    }


    public function commentsAction()
    {
    }

    public function feedbacksAction()
    {
    }

    public function changelogsAction()
    {
    }
}
