<?php

namespace Framework;

use Framework\Database\DatabaseFactory;

/**
* Abstract class Dao
* For access the database
*/
abstract class Dao 
{
	protected static function getDatabase()
	{
		return DatabaseFactory::getInstance()->getDatabase();
	}
}