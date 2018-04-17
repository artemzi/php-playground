<?php

namespace app\components\currency;


use eshop\App;
use RedBeanPHP\R;

class Currency {

    private $tpl;
    private $currencies;
    private $currency;

    public function __construct() {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    private function run() {
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    public static function getCurrencies() {
        return R::getAssoc(
            'SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC'
        ); // sort by base for easily get default in 0 position
    }

    public static function getCurrency($currencies) {
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies)) {
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    private function getHtml() {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}