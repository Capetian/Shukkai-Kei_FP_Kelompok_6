<?php

declare(strict_types=1);
namespace ShukkaiKei\Modules\Admin\Controllers;

use ShukkaiKei\Models\Forum\Subforums;
use ShukkaiKei\Models\Forum\Threads;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $posts_phql = "SELECT * FROM ShukkaiKei\Models\Blog\Posts";
        $users_phql = "SELECT * FROM ShukkaiKei\Models\Blog\Users";
        $comments_phql = "SELECT * FROM ShukkaiKei\Models\Blog\Comments";
        $feedbacks_phql = "SELECT * FROM ShukkaiKei\Models\Blog\Feedbacks";


        $posts = $this->modelsManager->executeQuery($posts_phql);
        $users = $this->modelsManager->executeQuery($users_phql);
        $comments = $this->modelsManager->executeQuery($comments_phql);
        $feedbacks = $this->modelsManager->executeQuery($feedbacks_phql);

        $this->view->setVar('posts', $posts);
        $this->view->setVar('users', $users);
        $this->view->setVar('comments', $comments);
        $this->view->setVar('feedbacks', $feedbacks);
    }


    public function forumAction()
    {
        $subforums = $this->toJson(Subforums::join('threads')->get());
        $threads = Threads::where("title", "%", ".")->join('replies')->orderBy("updated_at", "desc")->limit(5)->get();

        $this->view->subforums = $subforums;
        $this->view->threads = $threads;

    }

}
