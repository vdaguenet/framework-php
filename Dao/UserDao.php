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

		// bindParam fait la même chose que le execute ci-dessus en ajoute le type du paramètre attendu => Plus de sécurité.
		$stmt->bindParam(':username', $user->getUsername(), \PDO::PARAM_STR);
		$stmt->bindParam(':email', $user->getEmail(), \PDO::PARAM_STR);
		$stmt->bindParam(':password', $user->getPassword(), \PDO::PARAM_STR);
		$stmt->bindParam(':gender', $user->getGender(), \PDO::PARAM_STR);

		$stmt->execute();
	}
}