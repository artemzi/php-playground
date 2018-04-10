<?php
// App debug mode
define("DEBUG", 1);

// Paths
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/eshop/core');
define("LIBS", ROOT . '/vendor/eshop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'default');

// URLs
define("BASE_URL", "http://{$_SERVER['HTTP_HOST']}");
define("ADMIN", BASE_URL . '/admin');

// Requires
require_once ROOT . '/vendor/autoload.php';

if (DEBUG) {
    require_once LIBS . '/functions.php';
}