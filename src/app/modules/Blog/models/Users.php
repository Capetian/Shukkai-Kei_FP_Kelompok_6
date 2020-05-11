<?php

namespace ShukkaiKei\Modules\Blog\Models;


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
