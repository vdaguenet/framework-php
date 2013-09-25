<?php

namespace Dao;

use Model\User;
use Framework\Dao;

class UserDao extends Dao
{
	static public function save( User $user )
	{
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
	}
}