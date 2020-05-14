<?php

namespace ShukkaiKei\Services;


interface AccountService
{
    public function register(string $username, string $email, string $password, int $role);
    public function checkUsername(string $username);
    public function checkEmail(string $email);
    public function update();


}