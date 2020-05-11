<?php

return array(
    'Blog' => [
        'namespace' => 'ShukkaiKei\Modules\Blog',
        'controllerNamespace' => 'ShukkaiKei\Modules\Blog\Controllers',
        'className' => 'ShukkaiKei\Modules\Blog\Module',
        'path' => APP_PATH . '/modules/Blog/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
    'Forum' => [
        'namespace' => 'ShukkaiKei\Modules\Forum',
        'controllerNamespace' => 'ShukkaiKei\Modules\Forum\Controllers',
        'className' => 'ShukkaiKei\Modules\Forum\Module',
        'path' => APP_PATH . '/modules/Forum/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
    'Admin' => [
        'namespace' => 'ShukkaiKei\Modules\Admin',
        'controllerNamespace' => 'ShukkaiKei\Modules\Admin\Controllers',
        'className' => 'ShukkaiKei\Modules\Admin\Module',
        'path' => APP_PATH . '/modules/Admin/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
);