<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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
 * @version 2.4.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
$active = get_post_meta( $product_id, '_active', true );

?>

<?php if ( $active === 'yes' ) { ?>

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

    <p class="price"><?php echo $product->get_price_html(); ?></p>

    <meta itemprop="price" content="<?php echo esc_attr( $product->get_display_price() ); ?>" />
    <meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
    <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>

<!-- cf progress bar -->

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
                echo '<div>' . do_shortcode( "[product_crowdfunding_goal_remaining_progress_bar]" ) . '</div>';
        }

        elseif ( $cf_funding === 'yes' && $current_backers !='' && $target_backers !='' ) {
            echo '<div>' . do_shortcode( "[product_crowdfunding_goal_backers_remaining_progress_bar]" ) . '</div>';
        }

        elseif ( $cf_funding === 'yes' && $current_items !='' && $target_items !='' ) {
            echo '<div>' . do_shortcode( "[product_crowdfunding_goal_items_remaining_progress_bar]" ) . '</div>';
        }

        ?>

        <!-- cf countdown timer -->

        <?php
            
        if ( $cf_funding === 'yes' ) {

                echo '<div id = "prodCountdown"><p id = "funding_ending">Funding Ends In:</p><div id="funding_end_date"> </div></div>';
        }
        ?>

        <?php 
        $event_message = get_post_meta( $product_id, '_' . 'alg_crowdfunding_deadline', true );
        ?>
        
        <script>
         var event_message = '<?php echo $event_message; ?>';
          jQuery( document ).ready(function() {

                jQuery("#funding_end_date")
                .countdown(event_message, function(event) {
                jQuery(this).text(
                event.strftime('%D days %H:%M:%S')
                        );
                });
        });
        </script>

        <!-- percent funded -->
<?php
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

    }
        
?>


        

       