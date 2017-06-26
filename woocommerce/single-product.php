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

get_header(); ?>

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
</div> <!-- #content-area -->

<?php get_footer(); ?>
