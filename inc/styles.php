<?php
/**
 * D4TW register theme styles
 *
 * @package understrap
 */

// Add the theme fonts
function d4tw_enqueue_styles () {
    wp_enqueue_style( 'Open Sans', 'https://fonts.googleapis.com/css?family=Open+Sans' );
    wp_enqueue_style( 'bxSlider CSS', get_stylesheet_directory_uri() . '/bx-slider/jquery.bxslider.min.css' );
    wp_enqueue_style( 'Featherlight CSS', get_stylesheet_directory_uri() . '/fl/featherlight.css' );
    wp_enqueue_style( 'AOS CSS', get_stylesheet_directory_uri() . '/aos/aos.css' );
}
add_action('wp_enqueue_scripts', 'd4tw_enqueue_styles');