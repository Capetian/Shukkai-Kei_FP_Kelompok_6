<?php
declare(strict_types=1);
namespace ShukkaiKei\Modules\Blog\Controllers;

class ErrorController extends ControllerBase
{
    public function show404Action()
    {
        $this->view->pick('error/404');
    }
}