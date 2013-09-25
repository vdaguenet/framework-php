<?php

namespace Controller;

use Framework\Controller;

/**
* Classe UserController
* Implémente la méthode abstraite index.
**/

class UserController extends Controller
{
	// Retourne la vue correspondante avec un tableau de paramètres..
	public function index()
	{
		return $this->render('User/index', array(
			'pseudo' => 'Toto' 
			));
	}
}