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

	public function execute( Request $request ) 
	{
		// Verify controller
		if ($request->get('controller', false)) {
			$controllerName = '\\Controller\\'. $request->get('controller') .'Controller';
		} else {
		// Default controller if parameter not defined
			$controllerName = '\\Controller\\DefaultController';
		}

		$controller = new $controllerName();
		// Définit la page appelée. Index si elle n'est pas définit dans les paramètres.
		$pageName = $request->get('page', 'index');

		return $controller->$pageName( $request );
	}

	public function getBaseUrl()
  	{
   		$uri = explode('?', $_SERVER['REQUEST_URI']);
    
    	return $uri[0];
  	}
}