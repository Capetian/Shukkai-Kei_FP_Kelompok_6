<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Forum\Controllers;


use ShukkaiKei\Models\Forum\Subforums;
use ShukkaiKei\Models\Forum\Threads;
use ShukkaiKei\Models\Forum\Users;



class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick('index/index');
    }


    public function searchAction()
    {
        $request = $this->checkCSRF($this->request);
        $results =  Threads::where("title", "%", $request->getPost("search"))->join('user')->get();

        $this->view->results = $results;
        $this->view->pick('index/search');
    }

    public function forumAction()
    {
        $subforums = $this->toJson(Subforums::join('threads')->limit(5)->get());
        $threads = Threads::where("title", "%", ".")->join('replies')->orderBy("updated_at", "desc")->limit(5)->get();
        $this->view->subforums = $subforums;
        $this->view->threads = $threads;

        $this->view->pick('index/forum');
    }
}
