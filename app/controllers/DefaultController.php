<?php

namespace app\controllers;

use app\components\currency\Currency;
use app\models\DefaultModel;
use eshop\App;
use eshop\base\Controller;

class DefaultController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        new DefaultModel();

        App::$app->set('currencies', Currency::getCurrencies());
        App::$app->set(
            'currency',
            Currency::getCurrency(App::$app->getProperty('currencies'))
        );
    }

}