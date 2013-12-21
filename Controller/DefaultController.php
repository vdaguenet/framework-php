<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;

class DefaultController extends Controller
{
	/**
	* public function index
	* @param {Request} 
	* @return {View} default view
	*/
	public function index(Request $request)
	{
		return $this->render('default');
	}

}