<?php

namespace ShukkaiKei\Modules\Forum\Controllers;

use Phalcon\Http\Request as Request;
use Phalcon\Mvc\Controller;
use Phalcon\Tag as Tag;

class ControllerBase extends Controller
{
    public function onConstruct()
    {
        $headCol = $this->assets->collection('header');
        $headCol->addCss('css/bootstrap.min.css');


        $footerCol = $this->assets->collection('js');
        $footerCol->addJs('js/bootstrap.bundle.min.js');



        $this->tag->setTitle('Shukkai-Kei Forums');
        $this->tag->setDoctype(Tag::HTML5);
    }

    public function toJson($var)
    {
        return json_decode($var->toJson());
    }

    public function toID($id)
    {
        return new \MongoDB\BSON\ObjectId($id);
    }

    public function checkCSRF(Request $req)
    {
        if ($req->isPost()) {
            if ($this->security->checkToken()) {
                return $req;
            }
        }
        $this->dispatcher->forward(
            [
                'controller' => 'index',
                'action'     => 'index',
            ]
        );
    }
}
