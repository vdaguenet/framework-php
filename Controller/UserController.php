<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\User;
use Dao\UserDao;

/**
* Classe UserController
* Implémente la méthode abstraite index.
**/

class UserController extends Controller
{
	// Retourne la vue correspondante avec un tableau de paramètres..
	public function index(Request $request)
	{
		return $this->render('User/index', array(
			'pseudo' => 'Toto' 
			));
	}

	public function register(Request $request)
	{
		if($request->isMethod('POST')) {
			// traitement si on est en POST
			$user = new User($request->get('username'), $request->get('password'), $request->get('email'), $request->get('gender'));

			UserDao::save($user);
		}
		return $this->render('User/register');
	}
}