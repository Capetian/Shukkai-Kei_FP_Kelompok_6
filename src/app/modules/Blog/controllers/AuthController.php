<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Blog\Controllers;

use ShukkaiKei\Modules\Blog\Models\Users;


class AuthController extends ControllerBase
{


    public function indexAction()
    {
    }

    public function loginAction()
    {
    }

    public function signinAction()
    {
        $data['username'] = $this->request->getPost('username');
        $data['password'] = $this->request->getPost('password');

        $user = Users::findFirst(
            [
                'conditions' => 'username = :username:',
                'bind' => [
                    'username' => $data['username']
                ],
            ]
        );

        $valid_login = true;
        if ($user != NULL) {
            if ($this->security->checkHash($data['password'], $user->password)) {
                $valid_login = true;
            } else {
                $valid_login = false;
            }
        } else {
            $valid_login = false;
        }

        if ($valid_login) {
            if ($user->active == 0) {
                $this->flashSession->error("User is banned from the server");
                $this->response->redirect('/Blog/auth/login');
            } else {
                $role = $user->is_admin ? 2 : 0;
                $this->account->login($data['username'], $role);

                // $this->flashSession->success('Login success');
                $this->response->redirect('/Blog');
            }
        } else {
            $this->flashSession->error("Invalid username and password");
            $this->response->redirect('Blog/auth/login');
        }
    }

    public function registerAction()
    {
    }

    public function storeAction()
    {
        $account = $this->account;
        $data['username'] = $this->request->getPost('username');
        $data['email'] = $this->request->getPost('email');
        $data['password'] = $this->request->getPost('password');
        $data['pass_confirm'] = $this->request->getPost('pass_confirm');

        $username_taken = $account->checkUsername($data['username']);

        $email_taken = $account->checkEmail($data['email']);

        if ($username_taken) {
            $this->flashSession->error('Username has been taken');
            $this->response->redirect('/Blog/auth/register');
        } else if ($email_taken) {
            $this->flashSession->error('E-mail has been taken');
            $this->response->redirect('/Blog/auth/register');
        } else if ($data['password'] !== $data['pass_confirm']) {
            $this->flashSession->error('Password and Confirm password are not identical');
            $this->response->redirect('/Blog/auth/register');
        } else {
            $account->register($data['username'], $data['email'], $data['password'], 0);
            $account->login($data['username'], 0);
            // $this->flashSession->success('Register success');
            $this->response->redirect('/Blog');
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();

        // $this->flashSession->success('Logout success');
        $this->response->redirect('/Blog');
    }
}
