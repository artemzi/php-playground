<?php

namespace eshop;

class Registry {

    use TSingle;

    private static $properties = [];

    public function set(string $name, $value) {
        self::$properties[$name] = $value;
    }

    public function getProperty(string $name) {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }

        return null;
    }

    // for debug
    public function getAllProps() {
        return self::$properties;
    }
}