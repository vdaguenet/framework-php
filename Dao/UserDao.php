<?php

namespace Dao;

use Model\User;
use Framework\Dao;

class UserDao extends Dao
{
	/**
	* static public function save
	* Save user in database
	* @param {User} $user 
	* @return {Boolean}
	*/
	static public function save( User $user )
	{
		if (self::findOneByUsername($user->getUsername())) {
			return false;
		}

		$stmt = self::getDatabase()->prepare('INSERT INTO user(username, email, password, gender, avatar) VALUES (:username, :email, :password, :gender, :avatar)'); // stmt = statement

		$stmt->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
		$stmt->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
		$stmt->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
		$stmt->bindValue(':gender', $user->getGender(), \PDO::PARAM_STR);
		$stmt->bindValue(':avatar', $user->getAvatar(), \PDO::PARAM_STR);

		$stmt->execute();

		return true;
	}

	/**
	* static public function update
	* Save modifications of an user in database
	* @param {User} 
	*/
	static public function update(User $user)
	{
		if (self::findOneByUsername($user->getUsername()) instanceof User) {
			$modifiedColumns = $user->getModifiedColumns();
			$query = 'UPDATE user SET';
			$parameters = array();

			foreach ($modifiedColumns as $column) {
				$query .= ' ' . $column . ' = ?, ';
				$methodName = 'get' . $column;
				$parameters[] = $user->$methodName();
			}
			$query = substr($query, 0, -2);
			$query .= ' WHERE username = \'' . $user->getUsername() .'\'';

			$stmt = self::getDatabase()->prepare($query);
			$stmt->execute($parameters);
		} else {
			$error = 'Unknown user.';
			return $this->render('User/update', array(
				'error' => $error
			));
		}
	}

	/**
	* public function findOneByUsername
	* Search an user with his username in the database
	* @param {String} $username
	* @return {User}
	*/
	static public function findOneByUsername($username)
	{
		$stmt = self::getDatabase()->prepare('
			SELECT username, email, password, gender, avatar 
			FROM user 
			WHERE username = :username'
		);

		$stmt->bindValue(':username', $username, \PDO::PARAM_STR);

		$stmt->execute();

		$data = $stmt->fetch(\PDO::FETCH_ASSOC);

		if (false === $data) {
			
			return false;
		}
		
		return new User($data['username'], $data['password'], $data['email'], $data['avatar'], $data['gender']);

	}
}