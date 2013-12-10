<?php

namespace Dao;

use Model\User;
use Framework\Dao;

class UserDao extends Dao
{
	/**
	* Insert an user object into table news.
	* @param User $news
	* @return boolean
	**/
	static public function save( User $user )
	{
		if (self::findOneByUsername($user->getUsername())) {
			return false;
		}
		$stmt = self::getDatabase()->prepare('INSERT INTO user(username, email, password, gender) VALUES (:username, :email, :password, :gender)'); // stmt = statement
		/*$stmt->execute(array(
				'username' => $user->getUsername(),
				'email' => $user->getEmail(),
				'password' => $user->getPassword(),
				'gender' => $user->getgender()
			));*/

		// bindValue fait la même chose que le execute ci-dessus en ajoute le type du paramètre attendu => Plus de sécurité.
		$stmt->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
		$stmt->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
		$stmt->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
		$stmt->bindValue(':gender', $user->getGender(), \PDO::PARAM_STR);

		$stmt->execute();

		return true;
	}

	/**
	* Change the email adress in database
	**/
	static public function update(User $user)
	{
		/* Vérifier l'existence de l'utilisateur */

		$modifiedColumns = $user->getModifiedColumns();
		$query = 'UPDATE user ';
		$parameters = array();

		foreach ($modifiedColumns as $column) {
			$query .= 'SET ' . $column . ' = ?, ';
			$methodName = 'get' . $column;
			$parameters[] = $user->$methodName();
		}

		$query = substr($query, 0, -2);

		$stmt = self::getDatabase()->prepare($query);
		$stmt->execute($parameters);
	}

	/**
	* Search an user with his username in the database
	* @param String $username
	* @return User
	**/
	static public function findOneByUsername($username)
	{
		$stmt = self::getDatabase()->prepare('
			SELECT username, email, password, gender 
			FROM user 
			WHERE username = :username'
		);

		$stmt->bindValue(':username', $username, \PDO::PARAM_STR);

		$stmt->execute();

		$data = $stmt->fetch(\PDO::FETCH_ASSOC);

		if (false === $data) {
			
			return false;
		}
		
		return new User($data['username'], $data['password'], $data['email'], $data['gender']);

	}
}