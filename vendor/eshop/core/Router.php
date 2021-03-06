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
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . 
                self::$route['controller'] . 'Controller';
                if (class_exists($controller)) {
                    $controllerObject = new $controller(self::$route);
                    $action = self::formatActionName(self::$route['action'])  . 'Action';
                    if (method_exists($controllerObject, $action)) {
                        $controllerObject->$action();
                        $controllerObject->getView();
                    } else {
                        throw new \Exception("Method {$controllerObject->$action} not found", 404);
                    }
                } else {
                    throw new \Exception("Controller {$controller} not found", 404);
                }
        } else {
            throw new \Exception("Page not found", 404);
        }
    }

    public static function matchRoute($url) {
        foreach(self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                $route['controller'] = self::formatControllerName($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    // convert 'camel-case' to 'CamelCase'
    protected static function formatControllerName(string $name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    // convert result of 'self::formatControllerName' to 'camelCase'
    protected static function formatActionName($name) {
        return lcfirst(self::formatControllerName($name));
    }

    protected static function removeQueryString($url) {
        if($url) {
            $params = explode('&', $_SERVER['QUERY_STRING'], 2);
            $url = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
            if ($url[-1] === '/') {
                return rtrim($url, '/');
            } else {
                return $url;
            }
        }
    }
}