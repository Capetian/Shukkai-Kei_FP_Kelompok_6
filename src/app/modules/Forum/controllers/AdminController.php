<?php
declare(strict_types=1);
namespace ShukkaiKei\Modules\Forum\Controllers;

use ShukkaiKei\Modules\Forum\Controllers\ControllerBase;
use ShukkaiKei\Modules\Forum\Models\Subforums;
use ShukkaiKei\Modules\Forum\Models\Users;

class AdminController extends ControllerBase
{

    public function beforeExecuteRoute($dispatcher) {
        if ($this->session->auth['role'] < 2 ) {
            $this->dispatcher->forward(
                [
                    'controller' => 'index',
                    'action'     => 'index',
                ]
            );
        }
    }

    public function createSubAction()
    {
        $this->view->pick('subforum/create');  
    }

    public function storeSubAction()
    {
        $user = Subforums::init();
        $request = $this->checkCSRF($this->request);
        $user->fill(
            [
                'name' => $request->getPost('name'),
                'description' => $request->getPost('desc'),
            ]

        )->save();
        $this->response->redirect('/Forum/subforum/index');
    }

    public function listUserAction()
    {
        $users = $this->toJson(Users::orderBy("role", "desc")->get());
        $this->view->users = $users;
        $this->view->pick("admin/list"); 
    }

    public function updateRoleAction()
    {
        $request = $this->checkCSRF($this->request);
        $uid = $this->toID($request->getPost("uid"));
        $role = $request->getPost("role", "int");
        $user = Users::findById($uid);
        $user->role = $role;
        $user->save();
        $this->response->redirect('/Forum/admin/listUser');
    }



}