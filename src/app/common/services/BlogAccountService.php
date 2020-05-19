<?php

namespace ShukkaiKei\Services;

use ShukkaiKei\Models\Blog\Users;

class BlogAccountService implements AccountService
{

    public function register(string $username, string $email, string $password, int $role)
    {
        $new_user = new Users();
        $new_user->username = $username;
        $new_user->email = $email;
        $new_user->password = $password;
        $new_user->is_admin = $role;
        $new_user->active = 1;
        $new_user->save();
    }

    public function checkUsername(string $username)
    {
        $username_taken = Users::findFirst([
            'conditions' => 'username = :username:',
            'bind' => [
                'username' => $username

            ],
        ]);
        if ($username_taken) {
            return true;
        } else {
            return false;
        }
        
    }

    public function checkEmail(string $email)
    {
        $email_taken = Users::findFirst([
            'conditions' => 'email = :email:',
            'bind' => [
                'email' => $email

            ],
        ]);
        if ($email_taken) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {

    }

}
