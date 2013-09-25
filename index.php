<?php
spl_autoload_register();

$configurator = new Framework\Configurator();
$configurator->load('config/config.yml');

echo Framework\Router::getInstance()->execute(new Framework\Request());