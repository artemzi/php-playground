<?php

namespace app\controllers;


use eshop\Cache;
use RedBeanPHP\R;

class MainController extends DefaultController {

    public function indexAction() {
        $this->setMeta('Main page', 'description...', 'main');
    }
}