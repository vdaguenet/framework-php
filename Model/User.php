<?php

namespace Model;

class User
{
	private $modifiedColumns = array();

	private $username;
	private $password;
	private $email;
	private $gender;

	public function __construct($username, $password, $email, $gender = 'NA')
	{
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
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