<?php

namespace app\controllers;


use eshop\Cache;
use RedBeanPHP\R;

class MainController extends DefaultController {

    public function indexAction() {
        $brands = R::find('brand', 'LIMIT 3');
        $hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8"); // fields type is enum
        $this->setMeta('Main page', 'description...', 'main');

        $this->set(compact('brands', 'hits'));
    }
}