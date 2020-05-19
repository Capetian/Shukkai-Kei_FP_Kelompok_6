<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerClasses([
    'ShukkaiKei\Modules\Forum\Controllers\ErrorController' => APP_PATH . '/modules/Forum/controllers/ErrorController.php',
]);

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'ShukkaiKei\Models\Forum' => APP_PATH . '/common/models/Forum',
    'ShukkaiKei\Models\Blog' => APP_PATH . '/common/models/Blog',
    'ShukkaiKei\Services'        => APP_PATH . '/common/services/',
]);


$loader->register();
