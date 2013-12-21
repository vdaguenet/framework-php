<?php

namespace Framework;

use Model\User;
use Framework\Utils\Upload;
use Dao\UserDao;

/**
* Class Request
* Use for user connection and disconection
*/
class Request
{
	private $user;

	public function __construct()
	{
		$this->connectUser();
	}

	/**
	* public function get
	* Search parameter in superglobals variables 
	* @return value of the parameter if it's set. Null otherwise.
	*/
	public function get($parameterName, $default = null) // $default est une valeur par défaut au cas où le premier paramètre n'existe pas
	{
		if (isset($_POST[$parameterName])) {
			return $_POST[$parameterName];
		}
		if (isset($_GET[$parameterName]) ) {
			return $_GET[$parameterName];
		}
		if (isset($_FILES[$parameterName]) ) {
			return Upload::upload($_FILES[$parameterName]);
		}
		
		return $default;
	}

	/**
	* private function connectUser
	* Set attribute user with the current connected user
	*/
	private function connectUser()
	{
		if (!$this->isUserConnected()) {
      		$this->user = null;
    	} else {
      		$this->user = UserDao::findOneByUsername($_SESSION['current_user']);
    	}	
	}

	/**
	* public function disconnectUser
	*/
	public function disconnectUser()
	{
		unset($_SESSION['current_user']);
		$this->user = null;
	}

	/**
	* private function isUserConnected
	* Method to know if an user is connceted 
	* @return {Boolean}
	*/
	private function isUserConnected()
	{
  	return isset($_SESSION['current_user']);
	}

	/**
	* public function isMethod
	* Method to know the method used in the http header 
	* @return {Boolean}
	*/
	public function isMethod($method)
	{
		return $_SERVER['REQUEST_METHOD'] == $method;
	}

	/**
	* public function getUser
	* @return {User} user
	*/
	public function getUser()
	{
		return $this->user;
	}

	/**
	* public function setUser
	* @param {User} $user
	*/
	public function setUser( User $user)
	{
		$this->user = $user;
		$_SESSION['current_user'] = $user->getUsername();
	}
}