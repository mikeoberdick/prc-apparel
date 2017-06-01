<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class = "col-xs-12 col-sm-6 col-md-4 shopSmall" <?php post_class(); ?>>
	

	<?php

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );
	?>

<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	?>
	
	<?php the_post_thumbnail('prc-shop-thumb'); ?>
	
	<?php

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	?>

	<?php

    $product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
    $cf_funding = get_post_meta( $product_id, '_' . 'alg_crowdfunding_enabled', true );
	    if ( $cf_funding === 'yes' ) {
			echo '<div id = "prodCountdown"><p id = "funding_ending">Funding Ends In:</p><div id="countdown-' . $product_id . '"> </div></div>';
	    }
    ?>

    <?php 
        $product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
        $event_date = get_post_meta( $product_id, '_' . 'alg_crowdfunding_deadline', true );
        ?>
        
        <script>
          jQuery( document ).ready(function() {

                jQuery("#countdown-<?php echo $product_id; ?>")
                .countdown("<?php echo $event_date; ?>", function(event) {
                jQuery(this).text(
                event.strftime('%D days %H:%M:%S')
                        );
                });
        });
        </script>

        <!-- percent funded -->

        <?php

            $product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
            $cf_funding = get_post_meta( $product_id, '_' . 'alg_crowdfunding_enabled', true );
            
            $current_sum = alg_get_product_orders_data( "orders_sum", "sum" );
            $current_backers = alg_get_product_orders_data( "total_orders", "backers" );
            $current_items = alg_get_product_orders_data( "total_items", "items" );

            $target_sum     = get_post_meta( $product_id, "_" . "alg_crowdfunding_goal_sum", true );
            $target_backers     = get_post_meta( $product_id, "_" . "alg_crowdfunding_goal_backers", true );
            $target_items     = get_post_meta( $product_id, "_" . "alg_crowdfunding_goal_items", true );

        if ( $cf_funding === 'yes' && $current_sum !='' && $target_sum !='') {
            $percentage = $current_sum / $target_sum * 100;
                echo '<span>Funding: </span><span id = "shopPercentage">' . $percentage . '%</span></p>';
        }

        elseif ( $cf_funding === 'yes' && $current_backers !='' && $target_backers !='' ) {
        	$percentage = $current_backers / $target_backers * 100;
        		echo '<span>Funding: </span><span id = "shopPercentage">' . $percentage . '%</span></p>';
        }

        elseif ( $cf_funding === 'yes' && $current_items !='' && $target_items !='' ) {
        	$percentage = $current_items / $target_items * 100;
        		echo '<span>Funding: </span><span id = "shopPercentage">' . $percentage . '%</span></p>';
        }
        ?>


<?php
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
	</div>

