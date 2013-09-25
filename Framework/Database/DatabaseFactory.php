<?php

namespace Framework\Database;

use Framework\Configurator;
use Framework\Utils\Singleton;

class DatabaseFactory
{
	use Singleton;

	public function getDatabase()
	{
		$databaseConfigurations = Configurator::getInstance()->get('database', false);

		if (false === $databaseConfigurations) {
			throw new \Exception("Il manque des configurations pour la base de données");
		}
	}
}