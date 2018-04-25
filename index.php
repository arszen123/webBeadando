<?php

include_once __DIR__ . '/framework/bootstrap.php';

$config = include_once __DIR__ . '/conf/config.php';
define('WEBAPP_ROOT', __DIR__);
define('PUBLIC_DIR', __DIR__);

use Framework\App;

include_once __DIR__ . '/routes.php';

$app = new App($config, $route);
$app->run();