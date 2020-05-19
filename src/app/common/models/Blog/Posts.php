<?php

namespace ShukkaiKei\Models\Blog;


use Phalcon\Mvc\Model;

class Posts extends Model
{
    public $id;
    public $username;
    public $title;
    public $subtitle;
    public $content;
    public $active;
    public $created_at;
}
