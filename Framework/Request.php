<?php

namespace Framework;

use Model\User;
use Dao\UserDao;

/**
* Class Request
* Use for user connection / disconection
**/
class Request
{
	private $user;

	public function __construct()
	{
		$this->connectUser();
	}

	/**
	* Search parameter in superglobals variables 
	* @return value of $_POST or $_GET or null
	**/
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

	/**
	* Set $user with the current connected user
	**/
	private function connectUser()
	{
		if (!$this->isUserConnected()) {
      		$this->user = null;
    	} else {
      		$this->user = UserDao::findOneByUsername($_SESSION['current_user']);
    	}	
	}

	public function disconnectUser()
	{
		unset($_SESSION['user']);
		$this->user = null;
	}

	private function isUserConnected()
  	{
    	return isset($_SESSION['current_user']);
  	}

	/**
	* Method to know the method used in the http header 
	* @return boolean
	**/
	public function isMethod($method)
	{
		return $_SERVER['REQUEST_METHOD'] == $method;
	}

	/**
	* @return user $user
	**/
	public function getUser()
	{
		return $this->user;
	}

	/**
	* @param User $user
	**/
	public function setUser( User $user)
	{
		$this->user = $user;
		$_SESSION['current_user'] = $user->getUsername();
	}
}