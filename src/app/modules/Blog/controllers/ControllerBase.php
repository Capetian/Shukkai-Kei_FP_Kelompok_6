<?php
declare(strict_types=1);
namespace ShukkaiKei\Modules\Blog\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Tag as Tag;

class ControllerBase extends Controller
{
    public function onConstruct(){
        $headCol = $this->assets->collection('header');
        $headCol->addCss('css/bootstrap.min.css');
        $fontCol = $this->assets->collection('font');
        $fontCol->addCss('vendor/app/fontawesome-free/css/all.min.css');
        $footer = $this->assets->collection('js');
        $footer->addJs('js/bootstrap.bundle.min.js');




        $appCol = $this->assets->collection('appCss');
        $appCol->addCss('https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic',false);
        $appCol->addCss('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',false);
        $appCol->addCss('css/app/style.min.css');
       
        $authCol = $this->assets->collection('authCss');
        $authCol->addCss('fonts/font-awesome-4.7.0/css/font-awesome.min.css');
        $authCol->addCss('fonts/Linearicons-Free-v1.0.0/icon-font.min.css');
        $authCol->addCss('css/auth/util.css');
        $authCol->addCss('css/auth/main.css');





        $authFooter = $this->assets->collection('authJs');
        $authFooter->addJs('js/auth/main.js'); 

        $appFooter = $this->assets->collection('appJs');
        $appFooter->addJs('js/app/jqBootstrapValidation.js');
        $appFooter->addJs('js/app/contact_me.js');
        $appFooter->addJs('js/app/clean-blog.min.js"');


        $this->tag->setTitle('Shukkai-Kei Blog');
        $this->tag->setDoctype(Tag::HTML5);
    }
}
