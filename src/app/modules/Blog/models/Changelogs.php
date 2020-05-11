<?php
namespace ShukkaiKei\Modules\Blog\Models;
use Phalcon\Mvc\Model;

class Changelogs extends Model
{
    public $id;
    public $username;
    public $title;
    public $activated_pages;
    public $setted;
    public $created_at;
}
