<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<!-- SINGLE PRODUCT PAGE -->

	<?php if ( is_singular( 'product' ) ) {
    	while ( have_posts() ) : the_post();
        	wc_get_template_part( 'content', 'single-product' );
        endwhile;
    } else { ?>

<!-- SHOP PAGE -->
<div id = "page-wrapper">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id = "shopSectionTitle">
				<h5>Currently Funding</h5>
				<h1 class="page-title">Active Projects</h1>
			</div>
		</div><!-- .col-sm-12 -->
	</div><!-- .row -->

<?php //CUSTOM QUERY FOR PRODUCTS CURRENTLY BEING FUNDED

$args = array(
		'post_type' => 'product',
		'meta_key'     => '_alg_crowdfunding_enabled',
		'meta_value'   => 'yes', 
		);

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) :
	while ( $loop->have_posts() ) : $loop->the_post();
		wc_get_template_part( 'content', 'af-product' );
	endwhile;
	
	wp_reset_query(); // Reset the query 

endif; ?>

<div class="row">
	<div class="col-sm-12">
		<div id = "shopSectionTitle">
			<h5>Funding Completed</h5>
			<h1 class="page-title">In Production</h1>
		</div>
	</div><!-- .col-sm-12 -->
</div><!-- .row -->

<?php //CUSTOM QUERY FOR PRODUCTS IN PRODUCTION

$args = array(
		'post_type' => 'product',
		'meta_key'     => '_alg_crowdfunding_enabled',
		'meta_value'   => 'no',
 		);

$loop = new WP_Query( $args );
if ( $loop->have_posts() ) : $i = 0;
	while ( $loop->have_posts() ) : $loop->the_post();

if($i % 3 == 0) { ?> 
	<div class="row d-flex">
			<?php } ?>
    <?php wc_get_template_part( 'content', 'product' );
    	$i++;
if($i != 0 && $i % 3 == 0) { ?> 
	</div><!-- end of row -->
	<?php }

endwhile; ?>

<?php wp_reset_query(); // Reset the query ?>

<?php endif; } ?>

<?php do_action( 'woocommerce_after_shop_loop' ); ?>

</div>
</div>
</div>

<?php get_footer(); ?>