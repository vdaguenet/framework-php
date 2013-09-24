<?php

namespace Framework;

class Rooter 
// Singleton
{
	private static $instance;

	final public function __construct() 
	{ // Final empêche une classe fille de surcharger cette méthode

	}

	final public function __clone() 
	{
		throw new \Exception('Error : cannot clone singleton object');
	}

	public static function getInstance() 
	{
		if (!isset(self::$instance)) {
			$className = get_called_class();

			self::$instance = new $className();
		}

		return self::$instance;
	}

	public function execute() 
	{
		if (!isset($_GET['controller'])) {
			throw new \RuntimeException('Error : $_GET[\'controll   ser\'] not difined.');
			
		}
	}
}