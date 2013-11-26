<?php

namespace Framework;

use Framework\Database\DatabaseFactory;

abstract class Dao 
{
	protected static function getDatabase()
	{
		return DatabaseFactory::getInstance()->getDatabase();
	}
}