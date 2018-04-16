<?php

namespace app\controllers;

use app\components\currency\Currency;
use app\models\DefaultModel;
use eshop\App;
use eshop\base\Controller;
use eshop\Cache;
use RedBeanPHP\R;

class DefaultController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        new DefaultModel();

        App::$app->set('currencies', Currency::getCurrencies());
        App::$app->set(
            'currency',
            Currency::getCurrency(App::$app->getProperty('currencies'))
        );
        App::$app->set('categories', self::cacheCategory());
    }

    public static function cacheCategory() {
        $cache = Cache::getInstance();
        $categories = $cache->get('categories');
        if(!$categories) {
            $categories = R::getAssoc('SELECT * FROM category');
            $cache->set('categories', $categories);
        }

        return $categories;
    }

}