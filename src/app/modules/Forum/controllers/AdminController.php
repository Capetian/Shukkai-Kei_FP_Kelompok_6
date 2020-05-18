<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Forum\Controllers;

use ShukkaiKei\Modules\Forum\Controllers\ControllerBase;
use ShukkaiKei\Modules\Forum\Models\Subforums;
use ShukkaiKei\Modules\Forum\Models\Threads;
use ShukkaiKei\Modules\Forum\Models\Users;

class AdminController extends ControllerBase
{

    // public function beforeExecuteRoute($dispatcher) {
    //     if ($this->session->auth['role'] < 2 ) {
    //         $this->dispatcher->forward(
    //             [
    //                 'controller' => 'index',
    //                 'action'     => 'index',
    //             ]
    //         );
    //     }
    // }

    public function listThreadAction()
    {
        $threads = Threads::where("title", "%", ".")->join('replies')->orderBy("updated_at", "desc")->get();
        $this->view->threads = $threads;
        $this->view->pick('dashboard/thread/list');
    }

    public function listSubAction()
    {
        $subforums = $this->toJson(Subforums::join('threads')->get());

        $this->view->subforums = $subforums;

        $this->view->pick('dashboard/subforum/list');
    }

    public function createSubAction()
    {
        $this->view->pick('subforum/create');
    }

    public function storeSubAction()
    {
        $subforum = Subforums::init();
        $request = $this->checkCSRF($this->request);
        $subforum->fill(
            [
                'name' => $request->getPost('name'),
                'description' => $request->getPost('desc'),
            ]

        )->save();

        if ($subforum) {
            $this->flashSession->success('Subforum successfully added');
        } else {
            $this->flashSession->error('Failed to create new Subforum');
        }
        $this->response->redirect('Forum/subforum/list');
    }

    public function editSubAction($id)
    {

        $uid = $this->toID($id);
        $subforum = Subforums::findById($uid);

        $this->view->subforum = $subforum;
        $this->view->pick('subforum/edit');
    }

    public function updateSubAction($id)
    {
        $request = $this->checkCSRF($this->request);
        $uid = $this->toID($id);
        $name = $request->getPost("name");
        $desc = $request->getPost("desc");

        $subforum = Subforums::findById($uid);
        $subforum->name = $name;
        $subforum->desc = $desc;
        $subforum->save();

        if ($subforum) {
            $this->flashSession->success('Subforum successfully updated');
        } else {
            $this->flashSession->error('Failed to update subforum');
        }
        $this->response->redirect('Forum/subforum/list');
    }

    public function deleteSubAction($id)
    {
        $uid = $this->toID($id);
        $subforum = Subforums::findById($uid);
        $subforum->delete();

        if ($subforum) {
            $this->flashSession->success('Subforum successfully removed');
        } else {
            $this->flashSession->error('Failed to remove subforum');
        }
        $this->response->redirect('Forum/subforum/list');
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
