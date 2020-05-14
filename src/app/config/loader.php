<?php

use Phalcon\Loader;

$loader = new Loader();
/**
 * Register module classes
 */
$loader->registerClasses([
    'ShukkaiKei\Modules\Blog\Models\Users' => APP_PATH . '/modules/Blog/models/Users.php',
    'ShukkaiKei\Modules\Forum\Models\Users'      => APP_PATH . '/modules/Forum/models/Users.php'
]);

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'ShukkaiKei\Models' => APP_PATH . '/common/models/',
    'ShukkaiKei'        => APP_PATH . '/common/library/',
    'ShukkaiKei\Services'        => APP_PATH . '/common/services/',
]);


$loader->register();
