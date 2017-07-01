<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<?php if ( is_active_sidebar( 'footer_1') || is_active_sidebar( 'footer_2') || is_active_sidebar( 'footer_3') || is_active_sidebar( 'footer_4') ) { ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

	<div id = "footerWidgets" class = "row">

		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_1'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_2'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_3'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_4'); ?>
		</div>

	</div><!-- #footerWidgets -->

	</div><!-- .container -->

	<?php } ?>

<footer id = "bottomFooter" class = "site-footer container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-6 footerCopy">
				Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?><br>
				<span>Website by <a href = "http://www.designs4theweb.com">Designs 4 The Web</a></span>
			</div><!-- .col-md-6 -->

			<div class="col-md-6 footerSocial">
				<div>
					<a target = "_blank" href = "<?php the_field('twitter', 'options'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a target = "_blank" href = "<?php the_field('instagram', 'options'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a target = "_blank" href = "<?php the_field('vimeo', 'options'); ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
					<a target = "_blank" href = "<?php the_field('pinterest', 'options'); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
				</div>
			</div><!-- .col-md-6 -->
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- .site-footer -->

</div><!-- wrapper end -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>
