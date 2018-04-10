<?php

define("DEBUG", 1);

define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/eshop/core');
define("LIBS", ROOT . '/vendor/eshop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'default');

define("BASE_URL", "http://{$_SERVER['HTTP_HOST']}");
define("ADMIN", BASE_URL . '/admin');

require_once ROOT . '/vendor/autoload.php';