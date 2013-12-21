<?php

namespace Framework\Utils;

trait Singleton {
	private static $instance;

	final public function __construct() 
	{ 
		// Empty constructor to prevent over definition.
	}

	final public function __clone() 
	{
		throw new \Exception('Error : cannot clone singleton object');
	}

	/**
	* The definition of singleton design pattern :
	* 	can be instancied once. Return the instance otherwise. 
	*/
	public static function getInstance() 
	{
		if (!isset(self::$instance)) {
			$className = get_called_class();

			self::$instance = new $className();
		}

		return self::$instance;
	}
}