<?php

namespace ShukkaiKei\Models\Blog;


use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $is_admin;
    public $active;
}
