<?php

// Prettify array print
function dumper($data) {
    /* highlight_string("<?php\n" . print_r($data, true) . "\n?>");*/
    echo '<pre>' . print_r($data, true) . '</pre>';
}