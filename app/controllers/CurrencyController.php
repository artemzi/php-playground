<?php

namespace app\controllers;


use RedBeanPHP\R;

class CurrencyController extends DefaultController {

    public function changeAction() {
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency) {
            $curr = R::findOne('currency', 'code = ?', [$currency]);
            if(null !== $curr) {
                setcookie('currency', $currency, time() + 3600 * 24 * 7, '/');
            }
        }
        redirect();
    }

}