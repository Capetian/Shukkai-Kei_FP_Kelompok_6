<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Forum\Controllers;


use ShukkaiKei\Models\Forum\Subforums;
use ShukkaiKei\Models\Forum\Threads;
use ShukkaiKei\Models\Forum\Users;



class ForumController extends ControllerBase
{

    public function indexAction()
    {
        $subforums = $this->toJson(Subforums::join('threads')->limit(5)->get());
        $threads = Threads::where("title", "%", ".")->join('replies')->orderBy("updated_at", "desc")->limit(5)->get();
        $this->view->subforums = $subforums;
        $this->view->threads = $threads;

        $this->view->pick('index/forum');
    }
}
