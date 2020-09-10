<?php

if ( ! function_exists( 'get_app_title' ) ) {
    function get_page_title( $name = "" )
    {
        if ( $name ) {
            $name = " {$name} | ";
        }

        return $name . config( 'app.name', 'Lux' );
    }
}
