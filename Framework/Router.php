<?php

namespace Framework;

use Framework\Utils\Singleton; // Import du trait Singleton

/**
* Classe Router
* Sert à "récupérer" la request et retourne le controller et la page correspondante.
* Utilise le design pattern Singleton
**/
 
class Router 
{
	use Singleton;	// Utilisation du trait

/*	public function execute( Request $request ) 
	{
		// Verify controller
		if ($request->get('controller', false)) {
			$controllerName = '\\Controller\\'. $request->get('controller') .'Controller';
		} else {
		// Default controller if parameter not defined
			$controllerName = '\\Controller\\DefaultController';
		}
		$controller = new $controllerName($this);

		// Définit la page appelée. Index si elle n'est pas définit dans les paramètres.
		$pageName = $request->get('page', 'index');

		return $controller->$pageName( $request );
	}*/

	public function execute( Request $request ) 
	{
		$url = explode('?', $_SERVER['REQUEST_URI']);

		if (isset($url[1])) {
			$uri = explode('/', $url[1]);
		}
		
		if(isset($uri[1])) {
			$controllerURL = $uri[1];
		}
		// Définit la page appelée. Index si elle n'est pas définit dans les paramètres.
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

	public function getBaseUrl()
  	{
   		$uri = explode('?', $_SERVER['REQUEST_URI']);
    
    	return $uri[0];
  	}
}