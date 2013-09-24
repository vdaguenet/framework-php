<?php
spl_autoload_register();

echo Framework\Rooter::getInstance()->execute(new Framework\Request());