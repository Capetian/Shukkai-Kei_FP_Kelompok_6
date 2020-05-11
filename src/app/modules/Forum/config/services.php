<?php

use Phalcon\Mvc\View;

$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setViewsDir($config->get('application')->viewsDir);
    
    $view->registerEngines([
        '.volt'  => 'voltShared',
    ]);

    return $view;

});
