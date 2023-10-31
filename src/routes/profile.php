<?php

$router->get('/profile', 'App\Controllers\ProfileController@index');
$router->get('/profile/password', 'App\Controllers\ProfileController@getChangePassword');
$router->post('/profile/password', 'App\Controllers\ProfileController@postChangePassword');
