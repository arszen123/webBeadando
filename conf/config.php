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
        ]
    ],
    'dbFiles' => __DIR__ . '/../data',
    'viewFiles'
];