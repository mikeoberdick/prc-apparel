<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
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

	<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<!-- Add the bootstrap markup -->
<div id="main-content">
	<div class="container-fluid">
		<div id="content-area" class="clearfix row">
			
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop ?>

	<div id = "hero_images" class = "container-fluid">
		<div class = "row">
			<?php if( get_field('hero_image_1') ): ?>
				<div class = "col-sm-12">
					<img src="<?php the_field('hero_image_1'); ?>" />
				</div>
			<?php endif; ?>

		</div><!-- .row -->
		
		<div class = "row">
			<?php if( get_field('hero_image_2') ): ?>
				<div class = "col-sm-12 col-md-6" style = "padding-right: 0;">
					<img src="<?php the_field('hero_image_2'); ?>" />
				</div>
			<?php endif; ?>

			<?php if( get_field('hero_image_3') ): ?>
				<div class = "col-sm-12 col-md-6" style = "padding-left: 0;">
					<img src="<?php the_field('hero_image_3'); ?>" />
				</div>
			<?php endif; ?>

		</div><!-- .row -->

		<div class = "row">
			<?php if( get_field('hero_image_4') ): ?>
				<div class = "col-sm-12">
					<img src="<?php the_field('hero_image_4'); ?>" />
				</div>
			<?php endif; ?>
		</div>
	</div>

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
