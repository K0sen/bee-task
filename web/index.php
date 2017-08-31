<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);

//for development state
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include ROOT . 'vendor' . DS . 'autoload.php';

$config = require(ROOT . 'config' . DS . 'config.php');

(new app\components\App())->run($config);