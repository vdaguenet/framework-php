<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Framework\Utils\Crypt;
use Model\User;
use Dao\UserDao;

/**
* Classe UserController
* Implémente la méthode abstraite index.
**/

class UserController extends Controller
{
	/**
	* @param Request $request
	* @return view User/index.php with array of parameters
	**/
	public function index(Request $request)
	{
		return $this->render('User/index', array(
				'pseudo' => ''
			));
	}

	/**
	* Call method save if the form is completed and submited 
	* @param Request $request
	* @return view User/register.php
	**/
	public function register(Request $request)
	{
		if($request->isMethod('POST')) {
			// traitement si on est en POST
			$password = Crypt::encrypt($request->get('password'));
			// Là il faudrer salt le password. Par manque de temps cela ne sera pas fait.

			$user = new User($request->get('username'), $password, $request->get('email'), $request->get('gender'));

			UserDao::save($user);
		}
		return $this->render('User/register');
	}

	/**
	* @param Request $request
	* @return view User/login.php if user is not logged or if the couple login / password is wrong.
	* Return view User/index.php with pseudo as parameter otherwise.
	**/
	public function login(Request $request)
	{
		$error = null;

		if($request->isMethod('POST')) {
			$user = UserDao::findOneByUsername($request->get('username'));
			$password = Crypt::encrypt($request->get('password'));

			if (false === $user) {
				// Si l'utilisateur n'est pas trouvé en base de données
				$error = 'Le couple login & mot de passe est incorrect.';
			} elseif ($user->getPassword() != $password) { 
				// Si le mot de passe donné par l'utilisateur n'est pas correct.
				$error = 'Le couple login & mot de passe est incorrect.';
			} else {
				// Quand le MdP et le Login sont bons.
				$request->setUser($user);
			}

		}

		if($request->getUser() instanceof User) {
			// Utilisateur connecté
			return $this->render('User/index', array(
					'pseudo' => $request->getUser()->getUsername()
				));
		}

		return $this->render('User/login', array(
			'error' => $error
		));
	}

	/**
	* Call disconnectUser method
	* @param Request $request
	* @return view User/index.php
	**/
	public function logout(Request $request)
	{
		$request->disconnectUser();

		return $this->index($request);
	}
}