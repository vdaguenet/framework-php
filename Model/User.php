<?php

namespace Model;

class User
{
	private $modifiedColumns = array();

	private $username;
	private $password;
	private $email;
	private $avatar;
	private $gender;

	public function __construct($username, $password, $email, $avatar, $gender = 'NA')
	{
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->setAvatar($avatar);
		$this->setGender($gender);
	}


	/********************
	* Getters & Setters
	********************/

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;

		$this->modifiedColumns[] = 'email';
	}

	public function getAvatar()
	{
		return $this->avatar;
	}

	public function setAvatar($avatar)
	{
		if ('' != $avatar) {
			$this->avatar = $avatar;
		} else {
			$this->avatar = 'default.png';
		}
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function setGender($gender)
	{
		if ('M' != $gender && 'F' != $gender) {
			$this->gender = 'NA';
		} else {
			$this->gender = $gender;
		}

		$this->modifiedColumns[] = 'gender';
	}

	public function getModifiedColumns()
	{
		return $this->modifiedColumns;
	}

	public function flushColumns()
	{
		$this->modifiedColumns = array();
	}
}