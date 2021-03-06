<?php

namespace Framework\Database;

use Framework\Configurator;
use Framework\Utils\Singleton;

/**
* Factory for database drivers gestion.
*/
class DatabaseFactory
{
	use Singleton;
	
	/**
	* Create DatabaseDriver in depending on driver parameter in config/config.yml
	* @return DatabaseDriver
	**/
	public function getDatabase()
	{
		$databaseConfigurations = Configurator::getInstance()->get('database', false);

		if (false === $databaseConfigurations) {
			throw new \Exception("Database configuration missing.");
		}

		switch ($databaseConfigurations['driver']) {
			case 'mysql':
				$driver = new Driver\DatabaseMySQLDriver();
				break;

			case 'postgresql':
				$driver = new Driver\DatabasePostgreSQLDriver();
				break;
			
			default:
				throw new \Exception("Error database driver.");
		}

		return $driver->create($databaseConfigurations);
	}
}