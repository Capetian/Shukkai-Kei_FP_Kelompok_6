<?php
declare(strict_types=1);
namespace ShukkaiKei\Modules\Forum\Controllers;

use ShukkaiKei\Modules\Forum\Models\Users;

class UserController extends ControllerBase
{
    public function showAction($uid)
    {
        $user = Users::where("_id", $this->toID($uid))->first();
        $this->view->user = $user;
        $this->view->pick("user/show");
    }


    public function editAction()
    {
        $request = $this->checkCSRF($this->request);
        $changes = [];
        $uid = $request->getPost("uid");

        $em = $request->getPost("email", "email" );
        $pw = $request->getPost("password", "string");
        $confirm = $request->getPost("confirm", "string");
        if ( $em !== "" ) {
            $changes['email'] = $em;
        }
        if ( $pw !== "" && ($pw == $confirm) ) {
            $changes['password'] = $this->security->hash($pw);
        }
        $user = Users::where("_id",$this->toID($uid))->update($changes);
        $this->response->redirect("/Forum/user/show/".$uid);

    }
}