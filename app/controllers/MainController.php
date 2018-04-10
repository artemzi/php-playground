<?php

namespace app\controllers;

class MainController extends DefaultController {

    public function indexAction() {
        dumper($this->route);
        echo __METHOD__;
    }
}