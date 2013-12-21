<?php

namespace Framework;

use Framework\Utils\Singleton; // Import du trait Singleton

/**
* Classe Router
* Sert à "récupérer" la request et retourne le controller et la page correspondante.
* Utilise le design pattern Singleton
*/
class Router 
{
	use Singleton;	// Utilisation du trait

	/**
	* public function execute
	* Execute the HTTP request.
	* @param {Request} $request 
	* @return {Page} $page calles
	*/
	public function execute( Request $request ) 
	{
		$url = explode('?', $_SERVER['REQUEST_URI']);

		if (isset($url[1])) {
			$uri = explode('/', $url[1]);
		}
		
		if(isset($uri[1])) {
			$controllerURL = $uri[1];
		}

		if(isset($uri[2])) {
			$page = $uri[2];
		} else {
			$page = 'index';
		}
		
		// Verify controller
		if (isset($controllerURL)) {
			$controllerName = '\\Controller\\'. $controllerURL .'Controller';
		} else {
		// Default controller if parameter not defined
			$controllerName = '\\Controller\\DefaultController';
		}
		$controller = new $controllerName($this);
		
		return $controller->$page( $request );
	}

	/**
	* public function getBaseUrl
	* @return {String}
	*/
	public function getBaseUrl()
  	{
   		$uri = explode('?', $_SERVER['REQUEST_URI']);
    
    	return $uri[0];
  	}
}