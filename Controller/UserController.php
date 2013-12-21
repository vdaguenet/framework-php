<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Framework\Utils\Crypt;
use Model\User;
use Dao\UserDao;

class UserController extends Controller
{
	/**
	* public function index
	* @param {Request} 
	* @return {View}
	*/
	public function index(Request $request)
	{
		if (null != $request->getUser()) {
    	$user = $request->getUser();

    	return $this->render('User/index', array(
				'user' => $user
			));
    }

		return $this->redirect('User', 'login');
	}

	/**
	* public function register
	* @param {Request} 
	* @return {View}
	*/
	public function register(Request $request)
	{
		$error = null;

		if ($request->isMethod('POST')) {
	      	if ('' != $request->get('username', '') && '' != $request->get('password', '') && '' != $request->get('email', '')) {
				$user = UserDao::findOneByUsername($request->get('username'));
				if (null != $user) {
					$error = "Username already used.";
				}
				else {
					UserDao::save(new User($request->get('username'), Crypt::encrypt($request->get('password')), $request->get('email'), $request->get('avatar'), $request->get('gender')));

					return $this->redirect('User', 'login');
				}
			} else {
				$error = 'Data missing !';
			}
	  }

		return $this->render('User/register', array(
				'error' => $error
			));
	}

	/**
	* public function login
	* @param {Request} 
	* @return {View}
	*/
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
					$error = 'Wrong login or password.';
				} else {
					if ($user->getPassword() == Crypt::encrypt($request->get('password'))) {
						$request->setUser($user);

						return $this->redirect('User');
					} else {
						$error = 'Wrong login or password.';
					}
				}
			}
		}

		return $this->render('User/login', array(
			'error' => $error
		));
	}

	/**
	* public function disconnect 
	* @param {Request} 
	* @return {View}
	*/
	public function disconnect(Request $request)
	{
		$request->disconnectUser();

		return $this->index($request);
	}

	/**
	* public function update
	* @param {Request} 
	* @return {View}
	*/
	public function update(Request $request)
	{
		if (null == $request->getUser()) {
			return $this->redirect('User', 'login');
		}

		$error = null;
		if ($request->isMethod('POST')) {
			if ('' === $request->get('password', '') && '' === $request->get('email', '')) {
				$error = 'Data missing !';

				return $this->render('User/update', array(
					'error' => $error,
					'user'  => $request->getUser()
				));
			}
			$request->getUser()->flushColumns();
			$request->getUser()->setEmail($request->get('email'));
			$request->getUser()->setPassword(Crypt::encrypt($request->get('password')));
			if ($request->getUser()->getAvatar() !== $request->get('avatar')) {
				$request->getUser()->setAvatar($request->get('avatar'));
			}
			
			UserDao::update($request->getUser());

			return $this->redirect('User');
		}

		return $this->render('User/update', array(
			'error' => $error,
			'user'  => $request->getUser()
		));
	}
}