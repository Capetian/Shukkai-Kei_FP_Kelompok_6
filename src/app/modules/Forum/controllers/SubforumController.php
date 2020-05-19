<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Forum\Controllers;


use ShukkaiKei\Models\Forum\Subforums;
use ShukkaiKei\Models\Forum\Threads;


class SubforumController extends ControllerBase
{

    public function indexAction()
    {
        $subforums = $this->toJson(Subforums::join('threads')->get());

        $this->view->subforums = $subforums;

        $this->view->pick('subforum/index');
    }

    public function showAction($param)
    {
        $q = Subforums::findById($this->toID($param));
        $name = $q->name;
        $threads = Threads::where("title", "%", ".")->join('replies')->where('subforum_id', $this->toID($param))->inWhere('pinned', [false, true])
            ->orderBy('pinned', 'desc')->get();
        $this->view->threads = $threads;
        $this->view->name = $name;

        $this->view->pick('subforum/show');
    }

    
}
