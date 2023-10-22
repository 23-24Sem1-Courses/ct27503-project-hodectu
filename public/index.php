<?php

define('SRC_DIR', __DIR__ . '/../src');
define('VIEWS_DIR', __DIR__ . '/../src/views');

require_once SRC_DIR . '/bootstrap.php';

$router = new \Bramus\Router\Router();

require_once SRC_DIR . '/routes/signup.php';
$router->run();
