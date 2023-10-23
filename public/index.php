<?php

define('SRC_DIR', __DIR__ . '/../src');
define('VIEWS_DIR', __DIR__ . '/../src/views');

require_once SRC_DIR . '/bootstrap.php';

$router = new \Bramus\Router\Router();

$router->get('/', function () {
    require_once VIEWS_DIR . '/home/index.php';
});

$router->get('/login', function () {
    require_once VIEWS_DIR . '/login/index.php';
});

$router->get('/signup', function () {
    require_once VIEWS_DIR . '/signup/index.php';
});

$router->get('/forgot-pass', function () {
    require_once VIEWS_DIR . '/forgotPass/index.php';
});

$router->get('/cart', function () {
    require_once VIEWS_DIR . '/cart/index.php';
});

$router->get('/products/detail', function () {
    require_once VIEWS_DIR . '/product/index.php';
});

$router->run();
