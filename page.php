<?php
/**
 * The template for displaying all pages.
 *
 * This is the template for pages...note the conditionals for use with template parts.
 * Each page will need a container and a row.
 * These elements have been removed from this page to allow for each page to either be a fixed or fluid width container.
 *
 * @package understrap
 */

get_header();

?>

<div id="page-wrapper">

	<main class="site-main" id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php

			if( is_page( 'homepage' ) ) {
				get_template_part( 'template-parts/content', 'home' );
			}

			else if ( is_page( 'our-story' ) ) {
				get_template_part( 'template-parts/content', 'our-story' );
			}

			else if ( is_page( 'contact' ) ) {
				get_template_part( 'template-parts/content', 'contact' );
			}

			else if ( is_page( 'media' ) ) {
				get_template_part( 'template-parts/content', 'media' );
			}

			else {
			   get_template_part( 'loop-templates/content', 'page' );
			}

			?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>