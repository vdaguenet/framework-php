<?php

namespace Framework\Database\Driver;

/**
* PDO connection with MySQL driver
*/
class DatabaseMySQLDriver implements DatabaseDriverInterface
{
	public function create($databaseConfigurations)
	{
		return new \PDO ('mysql:host='.$databaseConfigurations['host'].';port='.$databaseConfigurations['port'].';dbname='.$databaseConfigurations['name'], $databaseConfigurations['user'], $databaseConfigurations['password']);
	}
}