<?php

use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;

class Bootstrap extends Application
{
	protected $modules;

	public function __construct()
	{
		$this->modules = require APP_PATH . '/config/modules.php';
	}

	public function init()
	{
		$this->_registerServices();
		/**
		 * Load modules
		 */
		$this->registerModules($this->modules);
		$test = $this->getModules();
		$response = $this->handle(
			$_SERVER["REQUEST_URI"]
		);

		$response->send();
	}

	private function _registerServices()
	{


		$defaultModule = 'Blog';

		$container = new FactoryDefault();
		$config = require APP_PATH . '/config/config.php';
		$modules = $this->modules;

		include_once APP_PATH . '/config/loader.php';
		include_once APP_PATH . '/config/services.php';
		include_once APP_PATH . '/config/routes.php';

		$this->setDI($container);
	}
}
