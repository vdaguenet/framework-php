<?php

namespace Framework;

use Model\User;
use Dao\UserDao;

/**
* Classe Request
* Gère la connection et la déconnection de l'utilisateur.
**/
class Request
{
	private $user;

	public function __construct()
	{
		$this->connectUser();
	}

	/**
	* Cherche un paramètre dans les variables globales.
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
	* Enregistre le nom de l'utilisateur en session
	**/
	private function connectUser()
	{
		if (!$this->isUserConnected()) {
      		$this->user = null;
    	} else {
      		$this->user = UserDao::findOneByUsername($_SESSION['current_user']);
    	}	
	}

	

	/**
	* Supprime la connection de l'utilisateur
	**/
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
	* Permet de connaitre la methode utilisée dans le header http 
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