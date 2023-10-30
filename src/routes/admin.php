<?php

$router->get('/admin', 'App\Controllers\AdminController@index');

$router->get('/admin/add', 'App\Controllers\AdminController@add');

$router->get('/admin/edit', 'App\Controllers\AdminController@edit');

$router->post('/admin/delete', 'App\Controllers\AdminController@delete');
