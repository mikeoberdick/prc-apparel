<?php
/**
 * Setup Advanced Custom Fields
 *
 * @package understrap
 */

//Add the ACF Company Info page
if( function_exists('acf_add_options_page') ) {
    $args = array(
    
    /* (string) The title displayed on the options page. Required. */
    'page_title' => 'Company Info',
    
    /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
    'menu_title' => 'Company Info',
);
    acf_add_options_page( $args );
}

//Add the ACF Shop Info page
if( function_exists('acf_add_options_page') ) {
    $args = array(
    
    /* (string) The title displayed on the options page. Required. */
    'page_title' => 'Shop Info',
    
    /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
    'menu_title' => 'Shop Info',
);
    acf_add_options_page( $args );
}

//Register the Google Maps API for use with ACF
function google_maps_scripts() {
	if (is_page('contact')) {
		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCchZFeKgbTVjhRLbwsM2v_cq_76iGlzRU', array(), '3', true );
		wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );
	}
}
add_action( 'wp_enqueue_scripts', 'google_maps_scripts' );

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyCchZFeKgbTVjhRLbwsM2v_cq_76iGlzRU';
	return $api;	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');