<?php

namespace Framework;

class Request
{
	public function get($parameterName, $default = null) // $default est une valeur par défaut au cas où le premier paramètre n'existe pas
	{
		if (!isset($_GET[$parameterName])) {
			
			return $default;
		}

		return $_GET[$parameterName];
	}
}