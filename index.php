<?php

spl_autoload_register();
session_start();

\Framework\Configurator::getInstance()->load('config/config.yml');

echo Framework\Router::getInstance()->execute(new Framework\Request());