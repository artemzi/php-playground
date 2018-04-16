<?php

namespace app\controllers;


use eshop\Cache;
use RedBeanPHP\R;

class MainController extends DefaultController {

    public function indexAction() {
        $brands = R::find('brand', 'LIMIT 3');
        $this->setMeta('Main page', 'description...', 'main');

        $this->set(compact('brands'));
    }
}