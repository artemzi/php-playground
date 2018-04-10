<?php

namespace eshop;

class Router {

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function getRoute() {
        return self::$route;
    }

    public static function dispatch($url) {
        if (self::matchRoute($url)) {
            echo '<p>Ok</p>';
        } else {
            echo '<p>No</p>';
        }
    }

    public static function matchRoute($url) {
        return true;
    }
}