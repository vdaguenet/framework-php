<?php

namespace Framework;

abstract class Dao 
{
	static public function getDatabase()
	{
		return new Database\DatabaseFactory()->getDatabase();
	}
}