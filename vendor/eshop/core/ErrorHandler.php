<?php

namespace eshop;

class ErrorHandler {

    public function __construct() {
        if (DEBUG) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(0);
        }

        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e) {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError("Exception", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '') {
        error_log("[" . date('Y-m-d H:i:s') . "] Error message: {$message} | File: {$file} | Line: {$line}\n---\n",
        3, ROOT . '/tmp/errors.log');
    }

    protected function displayError($errType, $errStr, $errFile, $errLine, $res = 404) {
        http_response_code($res);
        if ($res == 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die();
        }

        if (DEBUG) {
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
    }
}