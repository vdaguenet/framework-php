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

	public function get($configuration)
	{
		if (!isset($this->configurations[$configuration])) {
			throw new \InvalidArgumentException('The configuration with name : ' . $configuration . ' was not found !');
		}

		return $this->configurations[$configuration];
	}
}