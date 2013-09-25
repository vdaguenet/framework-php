<?php

namespace Framework\Utils;

trait Singleton { // Un trait est comme un fichier que l'on inclue dans d'autre classes. Evite la redondance de code.
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
}