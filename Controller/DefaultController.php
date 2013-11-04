<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;

class DefaultController extends Controller
{
	/**
	* @param Request $request
	* @return view default.php
	**/
	public function index(Request $request)
	{
		return $this->render('default');
	}

}