<?php

namespace ShukkaiKei\Modules\Blog\Models;


use Phalcon\Mvc\Model;

class Feedbacks extends Model
{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $content;
}
