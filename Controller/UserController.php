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
		if (null != $request->getUser()) {
      		$name = $request->getUser()->getUsername();
    	}
   		else {
      		$name = 'Anonymous';
    	}

		return $this->render('User/index', array(
				'name' => $name
			));
	}

	/**
	* Call method save if the form is completed and submited 
	* @param Request $request
	* @return view User/register.php
	**/
	public function register(Request $request)
	{
		$error = null;

		if ($request->isMethod('POST')) {
	      	if ('' != $request->get('username', '') && '' != $request->get('password', '') && '' != $request->get('email', '')) {
				$user = UserDao::findOneByUsername($request->get('username'));
				if (null != $user) {
					$error = "Le nom d'utilisateur est déjà réservé";
				}
				else {
					UserDao::save(new User($request->get('username'), Crypt::encrypt($request->get('password')), $request->get('email'), $request->get('gender')));

					return $this->redirect('User', 'login');
				}
			} else {
				$error = 'Il manque des données !';
			}
	    }

		return $this->render('User/register', array(
				'error' => $error
			));
	}

	/**
	* @param Request $request
	* @return view User/login.php if user is not logged or if the couple login / password is wrong.
	* Return view User/index.php with pseudo as parameter otherwise.
	**/
	public function login(Request $request)
	{
		if (null != $request->getUser()) {
      		return $this->redirect('User');
    	}
    
   		$error = null;
    
		if ($request->isMethod('POST')) {
			if (false !== $request->get('username', false) && false !== $request->get('password', false)) {
				$user = UserDao::findOneByUsername($request->get('username'));

				if (null == $user) {
					$error = 'La combinaison identifiant/mot de passe est incorrecte';
				} else {
					if ($user->getPassword() == Crypt::encrypt($request->get('password'))) {
						$request->setUser($user);

						return $this->redirect('User');
					} else {
						$error = 'La combinaison identifiant/mot de passe est incorrecte';
					}
				}
			}
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
	public function disconnect(Request $request)
	{
		$request->disconnectUser();

		return $this->index($request);
	}

	public function update(Request $request)
	{
		if (null == $request->getUser()) {
			return $this->redirect('User', 'login');
		}

		$error = null;
		if ($request->isMethod('POST')) {
			if ('' == $request->get('email', '')) {
				$error = 'Il manque des données !';
			} else {
				$request->getUser()->setEmail($request->get('email'));
				UserDao::update($request->getUser());
			}
		}

		return $this->render('User/update', array(
			'error' => $error,
			'user'  => $request->getUser()
		));
	}
}