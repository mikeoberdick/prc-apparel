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

<div id = "shopProduct"  <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">
    	<div class = "row">
    		<div class = "col-sm-12 shop_image">
    			<img src="<?php the_field('hero_image_1'); ?>" />
    		</div><!-- .cold-sm-12 -->
    	</div><!-- .row -->
    </a>

<?php
	$product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
	$active = get_post_meta( $product_id, '_active', true ); ?>

    <div class="row">
    	
    	<?php if ( $active === 'yes' ) { ?>

    	<div class = "col-md-4" id = "shopProductTitle">
    	<?php }

    	else { ?>
    	<div class = "col-md-8" id = "shopProductTitle">
    	<?php } ?>

    <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>

    	</div><!-- .shopProductTitle -->

<?php

$product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
$active = get_post_meta( $product_id, '_active', true );

if ( $active === 'yes' ) { ?>
	
	<div class = "col-sm-12 col-md-4">

	<?php

    $product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
    $cf_funding = get_post_meta( $product_id, '_' . 'alg_crowdfunding_enabled', true );
	    
	if ( $cf_funding === 'yes' ) {
			echo '<div id = "prodCountdown"><span id = "fundEndsIn">Funding Ends In: </span><span class = "shopCountdown" id="countdown-' . $product_id . '"> </span></div>';
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

    </div><!-- .col-sm-12 .col-md-4 -->

        
<div id = "shopPrice" class = "col-sm-12 col-md-2">
	<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
</div><!-- #shopPrice -->

<a id = "shopButton" class = "hidden-sm-down" href = "<?php the_permalink(); ?>">PRE-ORDER</a>

<!-- PERCENT FUNDED -->

<div class = "col-sm-12 col-md-2">
    <div id = "shopPercentFunded">

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
} ?>
    </div>
</div>

        <?php }

        else { ?>

        	<div class = "col-md-4 text-right"><a href="<?php the_permalink(); ?>"><span id = "notifyMe">NOTIFY ME</span></a></div>
        <?php } ?>
	</div><!-- .row -->
</div><!-- #shopProduct -->
