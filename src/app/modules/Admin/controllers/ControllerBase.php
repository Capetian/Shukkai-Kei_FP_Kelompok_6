<?php
declare(strict_types=1);
namespace ShukkaiKei\Modules\Admin\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Tag as Tag;

class ControllerBase extends Controller
{
    public function beforeExecuteRoute($dispatcher) {
        if ($this->session->auth['role'] < 2 ) {
            $this->response->redirect('/Blog');
        }
    }

    public function onConstruct(){
        $headCol = $this->assets->collection('header');
        $headCol->addCss('css/bootstrap.min.css');
        $fontCol = $this->assets->collection('font');
        $fontCol->addCss('vendor/app/fontawesome-free/css/all.min.css');
        $footer = $this->assets->collection('js');
        $footer->addJs('js/bootstrap.bundle.min.js');

        $adminCol= $this->assets->collection('adminCss');
        $adminCol->addCss('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',false);
        $adminCol->addCss('css/admin/style.min.css');
        $adminCol->addCss('vendor/admin/datatables/dataTables.bootstrap4.min.css');


        $adminFooter= $this->assets->collection('adminJs');
        $adminFooter->addJs('vendor/admin/jquery-easing/jquery.easing.min.js');
        $adminFooter->addJs('js/admin/sb-admin-2.min.js');
        $adminFooter->addJs('vendor/admin/chart.js/Chart.min.js');
        $adminFooter->addJs('js/admin/demo/chart-area-demo.js');
        $adminFooter->addJs('js/admin/demo/chart-pie-demo.js');
        $adminFooter->addJs('vendor/admin/datatables/jquery.dataTables.min.js');
        $adminFooter->addJs('vendor/admin/datatables/dataTables.bootstrap4.min.js');
        $adminFooter->addJs('js/admin/demo/datatables-demo.js');




        $this->tag->setTitle('Shukkai-Kei Admin Dashboard');
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
