<?php

use App\Data\Countries;

if (! function_exists('get_app_title')) {
    function get_page_title($name = '')
    {
        if ($name) {
            $name = " {$name} | ";
        }

        return $name.config('app.name', 'Lux');
    }
}

if (! function_exists('get_countries')) {
    function get_countries()
    {
        return ( new Countries() )->get();
    }
}
