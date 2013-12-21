<?php

namespace Framework;

/**
* Abstract class Controller
* Every controllers will implement this class
*/
abstract class Controller
{
	private $router;

	public function __construct(Router $router)
	{
		$this->router = $router;
	}

	public abstract function index(Request $request);

	/**
	* public function render
	* @param {String, array} view path, parameters
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
		include(__DIR__ . '/../web/views/layout.php');

		// Stock buffer content before cleaning
		$rendering = ob_get_contents();
		ob_end_clean();

		return $rendering;
	}

	/**
	* public function redirect
	* @param {String, String} Controller and page (optional) to call
	*/
	public function redirect($controller, $page = 'index')
	{
		$baseUrl = $this->router->getBaseUrl();

		header('Location: ' . $baseUrl . '?/' . $controller . '/' . $page);

		die;
	}
}