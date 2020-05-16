<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Forum\Controllers;

use ShukkaiKei\Modules\Forum\Models\Users;


class AuthController extends ControllerBase
{


    public function loginAction()
    {

        $this->view->pick('auth/login');
    }

    public function registerAction()
    {
        $this->view->pick('auth/register');
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
            $this->response->redirect('/Forum/auth/register');
        } else if ($email_taken) {
            $this->flashSession->error('E-mail has been taken');
            $this->response->redirect('/Forum/auth/register');
        } else if ($data['password'] !== $data['pass_confirm']) {
            $this->flashSession->error('Password and Confirm password are not identical');
            $this->response->redirect('/Forum/auth/register');
        } else {
            $account->register($data['username'], $data['email'], $data['password'], 0);
            $account->login($data['username'], 0);
            // $this->session->set('forum', ['uid' => $data['id']]);
            // $this->flashSession->success('Register success');
            $this->response->redirect('/Forum');
        }
    }

    public function signinAction()
    {

        $request = $this->request;
        $username = $request->getPost('us', 'string');
        $pass = $request->getPost('pw', "string");
        $user = Users::findFirst(["username" => $username])->toArray();

        if ($user['id'] != null) {
            if ($this->security->checkHash($pass, $user['password']) === true) {
                $this->account->login($user['username'], $user['role']);
                $this->session->set('forum', ['uid' => $user['id']]);
            } else {
                $this->flashSession->error('Password anda salah');
            }
        } else {
            $this->flashSession->error('Username tidak ditemukan');
        }
        $this->response->redirect('/Forum');
    }

    public function logoutAction()
    {
        $this->session->destroy();

        $this->response->redirect('/Forum');
    }
}
