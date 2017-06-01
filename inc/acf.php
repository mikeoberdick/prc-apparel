<?php
/**
 * Setup Advanced Custom Fields
 *
 * @package understrap
 */

//Add the ACF options page
if( function_exists('acf_add_options_page') ) {

    $args = array(
    
    /* (string) The title displayed on the options page. Required. */
    'page_title' => 'Site Content',
    
    /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
    'menu_title' => 'Site Content',
    
);

    acf_add_options_page( $args );
    
}