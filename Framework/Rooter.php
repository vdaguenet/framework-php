<?php

namespace Framework;

/**
* Classe Rooter
* Sert à "récupérer" la request et retourne le controller et la page correspondante.
* Utilise le design pattern Singleton
**/
 
class Rooter 
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
		// Vérification de l'éxistence du parmètre controller.
		if (!isset($_GET['controller'])) {
			throw new \RuntimeException('Error : $_GET[\'controller\'] not difined.');
		}

		// Définit le nom du controlleur et l'instancie.
		$controllerName = '\\Controller\\'. $_GET['controller'] .'Controller';
		$controller = new $controllerName();

		// Définit la page appelée. Index si elle n'est pas définit dans les paramètres.
		$pageName = 'index';
		if (isset($_GET['page'])) {
			$pageName = $_GET['page'];
		}

		return $controller->$pageName();
	}
}