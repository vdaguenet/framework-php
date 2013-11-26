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
				'pseudo' => $name
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
				'msg' => $error
			));
	}

	/**
	* @param Request $request
	* @return view User/login.php if user is not logged or if the couple login / password is wrong.
	* Return view User/index.php with pseudo as parameter otherwise.
	**/
	public function login(Request $request)
	{
		$error = null;

		if (null != $request->getUser()) {
      		return $this->redirect('User');
    	}

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

	public function editEmail(Request $request)
	{
		 if (null == $request->getUser()) {
      return $this->redirect('User', 'login');
    }
    
    $error = null;
    if ($request->isMethod('POST')) {
      if ('' == $request->get('email', '')) {
        $error = 'Il manque des données !';
      }
      else {
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