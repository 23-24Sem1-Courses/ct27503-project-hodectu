<?php

$router->get('/cart', function () {
    require_once VIEWS_DIR . '/cart/index.php';
});


$router->get('/cart', 'App\Controllers\CartController@index');
