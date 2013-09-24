<?php

namespace Framework;

class Rooter
{
	private static $instance;

	// Singleton
	public static function getInstance(){
		if (!isset(self::$instance)) {
			$className = get_called_class();

			self::$instance = new $className();
		}

		return self::$instance;
	}
}