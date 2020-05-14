<?php

namespace ShukkaiKei\Services;


class AccountManager
{
    private $accountServices;
    private $session;
    private $security;

    public function __construct($security, $session) {
        
        $this->accountServices = [new ForumAccountService , new BlogAccountService];
        $this->session = $session;
        $this->security = $security;
    }

    public function register(string $username, string $email, string $password, int $role)
    {
        foreach ($this->accountServices as $accountService) {
            $accountService->register($username, $email, $this->security->hash($password), $role);
        }
    }

    public function login(string $username, int $role)
    {
        $this->session->set('auth', ['username' => $username, 'role' => $role]);
    }

    public function update()
    {

    }

    public function checkUsername(string $username)
    {
        $found = false;
        foreach ($this->accountServices as $accountService) {
           $found = $accountService->checkUsername($username);
           if ($found == true) break;
        }
        return $found;
    }


    public function checkEmail(string $email)
    {
        $found = false;
        foreach ($this->accountServices as $accountService) {
            $found = $accountService->checkEmail($email);
            if ($found == true) break;
        }
        return $found;
    }
}
