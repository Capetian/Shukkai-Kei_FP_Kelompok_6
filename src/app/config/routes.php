<?php

$router = $container->getRouter();

$router->add('/', [
    'namespace' => $modules[$defaultModule]['controllerNamespace'],
    'module' => $defaultModule,
    'controller' => isset($modules[$defaultModule]['defaultController']) ? $modules[$defaultModule]['defaultController'] : 'index',
    'action' => isset($modules[$defaultModule]['defaultAction']) ? $modules[$defaultModule]['defaultAction'] : 'index'
]);

foreach ($modules as $moduleName => $module) {

    if ($module['defaultRouting'] == true) {
        /**
         * Default Module routing
         */
        $router->add('/'. $moduleName . '/:params', array(
            'namespace' => $module['controllerNamespace'],
            'module' => $moduleName,
            'controller' => isset($module['defaultController']) ? $module['defaultController'] : 'index',
            'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
            'params'=> 1
        ));
        
        $router->add('/'. $moduleName . '/:controller/:params', array(
            'namespace' => $module['controllerNamespace'],
            'module' => $moduleName,
            'controller' => 1,
            'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
            'params' => 2
        ));

        $router->add('/'. $moduleName . '/:controller/:action/:params', array(
            'namespace' => $module['controllerNamespace'],
            'module' => $moduleName,
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ));	
    }
}
