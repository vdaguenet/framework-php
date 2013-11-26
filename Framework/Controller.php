<?php

namespace Framework;

/**
* Abstract class Controller
* Every controllers will implement this class
**/
abstract class Controller
{
	private $router;

	public function __construct(Router $router)
	{
		$this->router = $router;
	}

	public abstract function index(Request $request);

	/**
	* @param view path
	* @return buffer content
	*/
	public function render($viewName, $parameters = array()) 
	{
		// Buffer start 
		ob_start();

		// Create variables
		foreach ($parameters as $key => $value) {
			$$key = $value;
		}
		
		// Include the view
		include(__DIR__ . '/../views/' . $viewName .'.php');

		// Stock buffer content before cleaning
		$rendering = ob_get_contents();
		ob_end_clean();

		return $rendering;
	}

	/**
	* @param $controller Controller to call
	* @param $page Page to call. Index if the parameter is not set
	*/
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