<?php

return [
    'controller' => 'Controller',
    'menu' => [
        'mainMenu' => [
            '/' => 'Fő oldal',
            'pizzas' => 'Pizzák',
            'order' => 'Rendelés',
            'login' => 'Bejelentkezés',
        ],
        'loggedInUserMenu' => [
            '/' => 'Fő oldal',
            'pizzas' => 'Pizzák',
            'order' => 'Rendelés',
            'logout' => 'Kijelentkezés',
        ],
        'loggedInAdminMenu' => [
            '/' => 'Fő oldal',
            'pizzas' => 'Pizzák',
            'admin' => 'Szerkesztő',
            'admin/order/list' => 'Rendelés lista',
            'logout' => 'Kijelentkezés',
        ]
    ],
    'dbFiles' => __DIR__ . '/../data',
    'viewFiles'
];