<?php

namespace ShukkaiKei\Services;

use ShukkaiKei\Modules\Forum\Models\Users;

class ForumAccountService implements AccountService
{

    public function register(string $username, string $email, string $password, int $role)
    {
        $user = Users::init();
        $user->fill(
            [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ]

        )->save();
    }

    public function checkUsername(string $username)
    {
        $username_taken = Users::findFirst(["username" => $username]);
        if($username_taken->id == null){
            return false;
        } else {
            return true;
        }
    }

    public function checkEmail(string $email)
    {
        $email_taken = Users::findFirst(["email" => $email]);
        if($email_taken->id == null){
            return false;
        } else {
            return true;
        }
    }

    public function update()
    {

    }

}
