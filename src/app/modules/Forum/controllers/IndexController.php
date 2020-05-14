<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Forum\Controllers;

use ShukkaiKei\Modules\Forum\Controllers\ControllerBase;
use ShukkaiKei\Modules\Forum\Models\Subforums;
use ShukkaiKei\Modules\Forum\Models\Threads;
use ShukkaiKei\Modules\Forum\Models\Users;



class IndexController extends ControllerBase
{

    public function indexAction()
    {

        $subforums = $this->toJson(Subforums::join('threads')->limit(5)->get());
        $threads = Threads::where("title", "%", ".")->join('replies')->orderBy("updated_at", "desc")->limit(5)->get();
        $this->view->subforums = $subforums;
        $this->view->threads = $threads;

        $this->view->pick('index/index');
    }


    public function searchAction()
    {
        $request = $this->checkCSRF($this->request);
        $results =  $this->toJson(Threads::where("title", "%", $request->getPost("search"))->join('user')->get());;
        $this->view->results = $results;
        $this->view->pick('/Forum/index/search');
    }
}
