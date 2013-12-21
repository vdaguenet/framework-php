<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\News;
use Model\User;
use Dao\NewsDao;

class NewsController extends Controller
{
	/**
	* public function index
	* @param {Request} 
	* @return {View}
	*/
	public function index(Request $request)
	{
		$newsList = NewsDao::listAllNews();

		if (isset($newsList) && empty($newsList)) {
			return $this->render('News/index');
		}

		return $this->redirect('News', 'newsList');
	}

	/**
	* public function newsList
	* @param {Request} 
	* @return {View}
	*/
	public function newsList(Request $request)
	{
		$newsList = NewsDao::listAllNews();
		$msg = null;

		if($request->isMethod('POST')) {
			NewsDao::deleteNewsById($request->get('id'));
			$newsList = NewsDao::listAllNews();
			$msg = 'News deleted.';
		}

		return $this->render('News/newsList', array(
				'msg' => $msg,
				'newsList' => $newsList
			));
	}

	/**
	* public function add
	* @param {Request} 
	* @return {View}
	*/
	public function add(Request $request)
	{
		if($request->getUser() instanceof User) {
			$msg = null;

			if($request->isMethod('POST')) {
				$news = new News(0, $request->get('title'), $request->getUser()->getUsername(), $request->get('content'));
				NewsDao::save($news);
				$msg = 'News added !';
			}

			return $this->render('News/add', array(
					'msg' => $msg
				));
		}

		return $this->redirect('User', 'login');
	}
}