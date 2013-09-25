<?php

namespace Framework;

use Framework\Utils\Singleton; // Import du trait Singleton

class Configurator
{
	use Singleton;	// Utilisation du trait

	private $configurations;

	public function load($filepath)
	{
		include(__DIR__ . '/../vendors/spyc.php');

		$this->configurations = \Spyc::YAMLLoad(__DIR__ . '/../'. $filepath); // Lecture et enregistrement du fichier YAML.
	}

	public function get($parameterName, $defaultValue = null) // $default est une valeur par défaut au cas où le premier paramètre n'existe pas
	{
		if (!isset($this->configurations[$parameterName])) {
			
			return $defaultValue;
		}

		return $this->configurations[$parameterName];
	}
}