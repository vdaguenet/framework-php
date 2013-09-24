<?php

namespace Controller;

use Framework\Controller;

/**
* Classe UserController
* Implémente la méthode abstraite index.
**/

class UserController extends Controller
{
	// Retourne la vue HTML correspondante.
	public function index()
	{
		return $this->render('User/index', array(
			'pseudo' => 'toto' 
			));
	}
}