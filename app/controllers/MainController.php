<?php

namespace app\controllers;


use RedBeanPHP\R;

class MainController extends DefaultController {

    public function indexAction() {
        // or use values from properties
        // App::$app->getProperty('shop_name');
        $this->setMeta('Main page', 'description...', 'main');

        $posts = R::findAll('test');
        $post = R::find('test', 'id=?', [2]); // debug; TODO: remove it or use
        $this->set(compact('posts'));
    }
}