<?php

if (!function_exists('clean_file_name')) {
    function clean_file_name($name) {
        $result = str_replace(' ', '-', $name);
        $result = str_replace('/', '-', $name);
        $result = str_replace('_', '-', $name);
        return $result;
    }
}

/* if (!function_exists('')) {
} */
