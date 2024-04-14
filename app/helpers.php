<?php

if (!function_exists('convert_array_access_to_dot_notation')) {
    function convert_array_access($str)
    {
        $string = preg_replace('/\[(\w+)\]/', '.$1', $str, 1);

        // Handle subsequent conversions
        return preg_replace('/\[(\w+)\]/', '.$1', $string);
    }
}
