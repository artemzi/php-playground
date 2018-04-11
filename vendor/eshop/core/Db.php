<?php

namespace eshop;


use eshop\TSingle;
use RedBeanPHP\R;

class Db {

    use TSingle;

    private function __construct() {
        $db = require_once CONFIG . '/database.php';
        R::setup($db['dsn'], $db['username'], $db['password']);

        if (!R::testConnection()) {
            throw new \Exception("Cannot open database connection", 500);
        }
        R::freeze(true); // do not allow automatic database changes
        if(DEBUG) {
            R::debug( TRUE, 1 );
        }
    }
}