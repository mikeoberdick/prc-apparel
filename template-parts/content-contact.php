<div id = "contact">
	<div id="content" class="container-fluid" tabindex="-1">
		<div class = "row">
			<div class = "col-sm-12">
				
			<?php
					$location = get_field('map', 'option');
						if( !empty($location) ):
					?>
					<div class="acf-map">
	 					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>

			</div>
		</div><!-- .row -->
	</div><!-- .container-fluid -->

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class = "contactEmail">
					<a href="mailto:andre@prcapparel.com"><i class="fa fa-envelope" aria-hidden="true"></i> andre@prcapparel.com</a>
				</div>
				<img class = "mx-auto d-block" src="<?php the_field('circle_logo', 'option'); ?>" alt="PRC Apparel">
			</div><!-- .col-sm-6 -->
			<div class="col-sm-6">
				<?php echo do_shortcode( '[ninja_form id=1]' ); ?>
			</div><!-- .col-sm-6 -->
		</div><!-- .row -->
	</div><!-- .container -->
</div>