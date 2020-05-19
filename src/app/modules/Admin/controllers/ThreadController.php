<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Admin\Controllers;


use ShukkaiKei\Models\Forum\Threads;

class ThreadController extends ControllerBase
{

    public function indexAction()
    {
        $threads = Threads::where("title", "%", ".")->join('replies')->orderBy("updated_at", "desc")->get();
        $this->view->threads = $threads;
    }

}