<?php

namespace eshop\base;


use eshop\Db;

abstract class Model {

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        Db::getInstance();
    }

}