<?php

namespace Framework;

/**
* Classe abstraite Controller
* Tous les controlleurs implémenteront cette classe
**/

abstract class Controller
{
	private $router;

	public function __construct(Router $router)
	{
		$this->router = $router;
	}

	public abstract function index(Request $request);

	public function render($viewName, $parameters = array()) 
	{
		// Création d'un buffer. Toute l'application y sera contenue. 
		ob_start();

		// Créer les variables dynamiquement.
		// Exemple : $key vaut monPseudo donc $$key vaut $monPseudo. Puis on donne une valeur à $monPseudo.
		foreach ($parameters as $key => $value) {
			$$key = $value;
		}
		
		// Lis le contenu du fichier passé en paramètre
		include(__DIR__ . '/../views/' . $viewName .'.php');

		// Récupère le contenu du buffer
		$rendering = ob_get_contents();
		
		// On arrête la mise dans le buffer et on le vide.
		ob_end_clean();

		return $rendering;
	}

	public function redirect($controller, $page = 'index')
	{
		$baseUrl = $this->router->getBaseUrl();

		header('Location: ' . $baseUrl . '?' . http_build_query(array(
			'controller' => $controller,
			'page' => $page
		)));

		die;
	}
}