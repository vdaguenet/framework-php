<?php

namespace Framework;

use Framework\Database\DatabaseFactory;

abstract class Dao 
{
	static public function getDatabase()
	{
		$dbFactory = new DatabaseFactory();
		return $dbFactory->getDatabase();
	}
}