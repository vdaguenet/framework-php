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
		// Vérification de l'éxistence du parmètre controller.
		if (false === $request->get('controller', false)) { // === car on veut false mais pas null et que en php null = false.
			throw new \RuntimeException('Error : parameter controller not difined.');
		}

		// Définit le nom du controlleur et l'instancie.
		$controllerName = '\\Controller\\'. $request->get('controller') .'Controller';
		$controller = new $controllerName();

		// Définit la page appelée. Index si elle n'est pas définit dans les paramètres.
		$pageName = $request->get('page', 'index');

		return $controller->$pageName( $request );
	}
}