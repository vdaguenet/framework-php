<?php

namespace Framework;

use Framework\Utils\Singleton;

class Configurator
{
	use Singleton;

	private $configurations;

	/**
	* Read the YAML configuration file
	*/
	public function load($filepath)
	{
		include(__DIR__ . '/../vendors/spyc.php');

		$this->configurations = \Spyc::YAMLLoad(__DIR__ . '/../'. $filepath);
	}

	/**
	* Get configuration attribute from YAML file
	*/
	public function get($configuration)
	{
		if (!isset($this->configurations[$configuration])) {
			throw new \InvalidArgumentException('The configuration with name : ' . $configuration . ' was not found !');
		}

		return $this->configurations[$configuration];
	}
}