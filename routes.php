<?php

$route->get('/','IndexController@getIndex');
$route->get('/pizzas','IndexController@getPizzas');
$route->get('/pizza','IndexController@getPizza');

$route->get('/login','AuthController@getLogin');
$route->post('/login','AuthController@postLogin');

$route->get('/register','AuthController@getRegistration');
$route->post('/register','AuthController@postRegistration');

$route->any('/logout','AuthController@anyLogout');

$route->get('/order','OrderController@getOrderList');
$route->post('/order','OrderController@postOrder');
