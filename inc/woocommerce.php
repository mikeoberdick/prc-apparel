<?php

/**

 * WooCommerce Customization

 *

 * @package understrap

 */



function add_cart_btn ($items) {



    if ( WC()->cart->get_cart_contents_count() ) {



        return $items .= '<a class="cart-contents" href="' . wc_get_cart_url() . '"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';

    }



    else {

        return $items;

    }

  

}

add_filter('wp_nav_menu_items','add_cart_btn');



// remove default sorting dropdown

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



//Remove the breadcrumbs from the shop and single product page

add_action( 'init', 'prc_remove_wc_breadcrumbs' );

function prc_remove_wc_breadcrumbs() {

    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

}



//Remove the tags on the single product page

add_action( 'after_setup_theme', 'prc_remove_product_tags' );

function prc_remove_product_tags() {

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

}



//Remove the product description excerpt on the single product page

add_action( 'after_setup_theme', 'prc_remove_product_excerpt' );

function prc_remove_product_excerpt() {

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

}



//Create the custom woocommerce product fields

add_action( 'woocommerce_product_options_general_product_data', 'prc_add_custom_fields' );

function prc_add_custom_fields() {



	// Add checkbox for active product or mailchimp signup

    woocommerce_wp_checkbox( array( 

    'id'            => '_active',

    'label'         => 'Active Product?', 

    'description'   => 'If active, product can be bought but if inactive mailchimp signup will display.',

    'desc_tip'      => 'true'

    )

);



    // Add the description text field

    // Add the Shop text field

    woocommerce_wp_textarea_input( array(

        'id' => '_shop',

        'label' => 'Shop',

        'description' => 'This will appear under the header "Shop" in the product specs section.',

        'desc_tip' => 'true'

    ) );

    woocommerce_wp_textarea_input( array(

        'id' => '_description',

        'label' => 'Product Description',

        'description' => 'This will appear under the header "Description" in the product specs section.',

        'desc_tip' => 'true'

    ) );

    
    // Add the material text field

    woocommerce_wp_textarea_input( array(

        'id' => '_material',

        'label' => 'Product Material',

        'description' => 'This will appear under the header "Material" in the product specs section.',

        'desc_tip' => 'true'

    ) );



    // Add the Specs text field

    woocommerce_wp_textarea_input( array(

        'id' => '_specifications',

        'label' => 'Product Specifications',

        'description' => 'This will appear under the header "Specifications" in the product specs section.',

        'desc_tip' => 'true'

    ) );



    // Add the shipping date field

    woocommerce_wp_textarea_input( array(

        'id' => '_ship_date',

        'label' => 'Est. Shipping Date',

        'description' => 'This will appear under the "PRE-ORDER" button on single product.',

        'desc_tip' => 'true'

    ) );



}



//Save the custom woocommerce fields

add_action( 'woocommerce_process_product_meta', 'prc_save_custom_fields' );

function prc_save_custom_fields( $post_id ) {

    if ( ! empty( $_POST['_active']) || empty( $_POST['_active'] ) ) {

        update_post_meta( $post_id, '_active', esc_attr( $_POST['_active'] ) );

    }

    if ( ! empty( $_POST['_shop']) || empty( $_POST['_shop'] ) ) {

            update_post_meta( $post_id, '_shop', esc_html( $_POST['_shop'] ) );

        }


	if ( ! empty( $_POST['_description'] ) ) {

	        update_post_meta( $post_id, '_description', esc_html( $_POST['_description'] ) );

	    }

        
    if ( ! empty( $_POST['_material'] ) ) {

        update_post_meta( $post_id, '_material', esc_html( $_POST['_material'] ) );

    }



    if ( ! empty( $_POST['_specifications'] ) ) {

        update_post_meta( $post_id, '_specifications', esc_html( $_POST['_specifications'] ) );

    }



    if ( ! empty( $_POST['_ship_date'] ) ) {

        update_post_meta( $post_id, '_ship_date', esc_attr( $_POST['_ship_date'] ) );

    }





}

// Add the shop thumbnail size

add_action( 'after_setup_theme', 'prc_thumb_sizes' );

function prc_thumb_sizes() {

    add_image_size( 'prc-shop-thumb', 400, 400, array( 'center', 'top' ) );

}
