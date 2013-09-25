<?php

namespace Framework;

class Request
{
	public function get($parameterName, $default = null) // $default est une valeur par défaut au cas où le premier paramètre n'existe pas
	{
		if (isset($_POST[$parameterName])) {
			
			return $_POST[$parameterName];
		}

		if (isset($_GET[$parameterName]) ) {
			
			return $_GET[$parameterName];
		}
		
		return $default;
	}

	public function connectUser()
	{
		$session = $_SESSION['username'];
	}

	public function isMethod($methodname)
	{
		return $_SERVER['REQUEST_METHOD'] == $methodname;
	}
}