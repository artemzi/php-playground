<?php

namespace app\controllers;


use eshop\Cache;
use RedBeanPHP\R;

class MainController extends DefaultController {

    public function indexAction() {
        // or use values from properties
        // App::$app->getProperty('shop_name');
        $cache = Cache::getInstance();
        $this->setMeta('Main page', 'description...', 'main');

        // if no posts in cache get it and set variable
        $posts = $cache->get('posts');
        if(!$posts) {
            $data = R::findAll('test');
            $cache->set('posts', $data);
            $posts = $cache->get('posts');
        }

        $this->set(compact('posts'));
    }
}