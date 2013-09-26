<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\News;
use Model\User;
use Dao\NewsDao;

/**
* Classe NewsController
* Implémente la méthode abstraite index.
**/

class NewsController extends Controller
{
	/**
	* @param Request $request
	* @return view News/index.php
	**/
	public function index(Request $request)
	{
		return $this->render('News/index');
	}

	/**
	* @param Request $request
	* @return view News/newsList.php with an array of object News
	**/
	public function newsList(Request $request)
	{
		$newsList = NewsDao::listAllNews();
		return $this->render('News/newsList', array(
				'newsList' => $newsList
			));
	}

	/**
	* @param Request $request
	* @return view News/add.php if the user is connected, login page otherwise.
	**/
	public function add(Request $request)
	{
		if($request->getUser() instanceof User) {
			// Utilisateur connecté
			if($request->isMethod('POST')) {
				// traitement si on est en POST
				$news = new News(0, $request->get('title'), $request->getUser()->getUsername(), $request->get('content'));

				NewsDao::save($news);
			}

			return $this->render('News/add');
		}

		header('Location: ?controller=User&page=login');
	}
}