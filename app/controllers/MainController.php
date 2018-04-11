<?php

namespace app\controllers;


class MainController extends DefaultController {

    public function indexAction() {
        // or use values from properties
        // App::$app->getProperty('shop_name');
        $this->setMeta('Main page', 'description...', 'main');

        $name = 'John Smith';
        $age = 30;
        $this->set(compact('name', 'age'));
    }
}