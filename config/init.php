<?php

date_default_timezone_set('Europe/Moscow');

// App debug mode
define('DEBUG', 1);

// Paths
define('PATH', '/');
define('ROOT', dirname(__DIR__));
define('WWW', ROOT . '/public');
define('APP', ROOT . '/app');
define('CORE', ROOT . '/vendor/eshop/core');
define('LIBS', ROOT . '/vendor/eshop/core/libs');
define('CACHE', ROOT . '/tmp/cache');
define('CONFIG', ROOT . '/config');
define('LAYOUT', 'default');
define('ROUTES', CONFIG . '/routes.php');

// URLs
define('BASE_URL', "http://{$_SERVER['HTTP_HOST']}");
define('ADMIN', BASE_URL . '/admin');

// Requires
require_once ROOT . '/vendor/autoload.php';
require_once LIBS . '/functions.php';
require_once ROUTES;
