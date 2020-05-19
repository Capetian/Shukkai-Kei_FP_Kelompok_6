<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Admin\Controllers;

use ShukkaiKei\Models\Forum\Users;

class ModeratorController extends ControllerBase
{

    public function indexAction()
    {
        $users = $this->toJson(Users::orderBy("role", "desc")->get());
        $this->view->users = $users;

    }

    public function updateAction()
    {
        $request = $this->checkCSRF($this->request);
        $uid = $this->toID($request->getPost("uid"));
        $role = $request->getPost("role", "int");
        $user = Users::findById($uid);
        $user->role = $role;
        $user->save();
        $this->response->redirect('/Admin/moderator');
    }
}
