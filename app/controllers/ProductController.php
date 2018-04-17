<?php

namespace app\controllers;


use RedBeanPHP\R;

class ProductController extends DefaultController {

    public function viewAction() {
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if (!$product) {
            throw new \Exception("Product {$alias} not exists", 404);
        }

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product'));
    }
}