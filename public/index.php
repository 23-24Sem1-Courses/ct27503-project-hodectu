<?php

define('SRC_DIR', __DIR__ . '/../src');
define('VIEWS_DIR', __DIR__ . '/../src/views');

require_once SRC_DIR . '/bootstrap.php';

$router = new \Bramus\Router\Router();

require_once SRC_DIR . '/routes/auth.php';
require_once SRC_DIR . '/routes/cart.php';
require_once SRC_DIR . '/routes/admin.php';
require_once SRC_DIR . '/routes/product.php';

$router->get('/', function () {
    require_once VIEWS_DIR . '/home/index.php';
});

$router->run();
