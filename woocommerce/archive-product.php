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

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		/***Remove the default wrapper***/
			//do_action( 'woocommerce_before_main_content' );
	?>

<!-- Add the bootstrap markup -->
<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix row">
		<div id = "shopSectionTitle">
			<h5>Currently Funding</h5>
			<h1 class="page-title">Active Projects</h1>
		</div>

			<?php

				//Custom query for products currently being funded
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

			<div id = "shopSectionTitle" class = "clearfix">
				<h5>Funding Completed</h5>
				<h1 class="page-title">In Production</h1>
			</div>

			<div>

			<?php

				//Custom query for products currently in production
				$args = array(
						'post_type' => 'product',
						'meta_key'     => '_alg_crowdfunding_enabled',
						'meta_value'   => 'no',
				 );
				$loop = new WP_Query( $args );

				if ( $loop->have_posts() ) :

				$i = 0;
				
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<?php

				if($i % 3 == 0) { ?> 
        		<div class="row d-flex">
   				<?php
   				}
    			?>
				    <?php wc_get_template_part( 'content', 'product' ); ?>

				    <?php 
				    $i++;
    				if($i != 0 && $i % 3 == 0) { ?> 
       				</div><!-- end of row -->
    				<?php
    				}

				endwhile; ?>

				<?php wp_reset_query(); // Reset the query ?>

			<?php endif; ?>

			</div>


			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		/***Remove the default closing tags for wrapper***/
		//do_action( 'woocommerce_after_main_content' );
		//Close the main content area div
		echo '</div> <!-- #content-area -->';
		echo '</div> <!-- .container -->';
		echo '</div> <!-- #main-content -->';
		echo '</div> <!-- main area -->';
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>