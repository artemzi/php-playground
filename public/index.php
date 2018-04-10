<?php

require_once dirname(__DIR__) . '/config/init.php';

use eshop\App;

new App();

App::$app->set('test', 'test value');
dumper(App::$app->getAllProps());
