<?php

namespace app\components\menu;


use eshop\App;
use eshop\Cache;
use RedBeanPHP\R;

class Menu {

    private $data;
    private $tree;
    private $menuHtml;
    private $tpl;
    private $container = 'ul';
    private $table = 'category';
    private $cache = 3600;
    private $cacheKey = 'myapp_menu';
    private $attrs = [];
    private $prepend = '';

    public function __construct(Array $options = []) {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    private function getOptions(Array $options) {
        foreach($options as $k => $v) {
            if(property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    private function run() {
        $cache = Cache::getInstance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml) {
            $this->data = App::$app->getProperty('categories');
            if(!$this->data) {
                $this->data = R::getAssoc("SELECT * FROM {$this->table}");
            }
        }
        $this->output();
    }

    private function output() {
        echo $this->menuHtml;
    }

    private function getTree() {

    }

    private function getMenuHtml($tree, $separator = '') {

    }

    private function categoryToTemplate($category, $separator, $id) {

    }

}