<?php

// Prettify array print
function dumper($data) {
    /* highlight_string("<?php\n" . print_r($data, true) . "\n?>");*/
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function redirect($to = false) {
    if($to) {
        $redirect = $to;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }

    header("Location: $redirect");
    die();
}