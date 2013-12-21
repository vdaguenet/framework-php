<?php

namespace Framework\Database\Driver;

/**
* PDO connection with MySQL driver
*/
class DatabasePostgreSQLDriver implements DatabaseDriverInterface
{
	public function create($databaseConfigurations)
	{
		return new \PDO ('pgsql:host='.$databaseConfigurations['host'].';port='.$databaseConfigurations['port'].';dbname='.$databaseConfigurations['name'], $databaseConfigurations['user'], $databaseConfigurations['password']);
	}
}