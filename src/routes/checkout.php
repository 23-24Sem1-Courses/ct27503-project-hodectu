<?php

$router->get('/checkout', 'App\Controllers\CheckoutController@index');

$router->post('/checkout', 'App\Controllers\CheckoutController@create');
