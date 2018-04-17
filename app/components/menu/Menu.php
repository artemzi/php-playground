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
    private $class = 'menu';
    private $table = 'category';
    private $cacheTime = 3600;
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
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if($this->cacheTime) {
                $cache->set($this->cacheKey, $this->menuHtml, $this->cacheTime);
            }
        }
        $this->output();
    }

    private function output() {
        $attrs = '';
        if(!empty($this->attrs)) {
            foreach($this->attrs as $k => $v) {
                $attrs .= " $k='$v' ";
            }
        }

        echo "<{$this->container} class='{$this->class}' $attrs>";
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    private function getTree() {
        $tree = [];
        $data = $this->data;
        foreach($data as $id=>&$node) {
            if(!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    private function getMenuHtml(Array $tree, $separator = '') {
        $str = '';
        foreach($tree as $id => $category) {
            $str .= $this->categoryToTemplate($category, $separator, $id);
        }
        return $str;
    }

    private function categoryToTemplate($category, $separator, $id) {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}