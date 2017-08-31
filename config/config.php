<?php

$routes = include(ROOT . 'config' . DS . 'routes.php');
$db = include(ROOT . 'config' . DS . 'db.php');

return [
    'db' => $db,
    'routes' => $routes,
    'default_layout' => 'main.php',
    'error_layout' => 'error.php'
];