<?php

namespace app\controllers;

use app\models\DefaultModel;
use eshop\base\Controller;

class DefaultController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        new DefaultModel();
    }

}