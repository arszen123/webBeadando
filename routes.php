<?php

$route->get('/', 'IndexController@getIndex');
$route->get('/pizzas', 'IndexController@getPizzas');
$route->get('/pizza', 'IndexController@getPizza');
$route->get('/pizza/add', 'IndexController@addPizza');

$route->get('/login', 'AuthController@getLogin');
$route->post('/login', 'AuthController@postLogin');

$route->get('/register', 'AuthController@getRegistration');
$route->post('/register', 'AuthController@postRegistration');

$route->any('/logout', 'AuthController@anyLogout');

$route->get('/order', 'OrderController@getOrderList');
$route->get('/order/make', 'OrderController@makeOrder');
$route->any('/order/bill', 'OrderController@getBill');

$route->get('/admin', 'AdminController@editPizza');
$route->post('/admin', 'AdminController@savePizza');
$route->get('/admin/order/list', 'AdminController@listOrders');
$route->get('/admin/order/done', 'AdminController@orderDone');

$route->missingRoute('IndexController@missingRoute');
$route->methodNotSupported('IndexController@missingRoute');