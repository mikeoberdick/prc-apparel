<div id="content" class="container-fluid hpHero" tabindex="-1" style = "background-image: url('<?php the_field('hero_image'); ?>')">
	<div class = "row opacityLayer">
		<div class = "container">
			<div class = "row">
				<div class = "col-sm-12 hpCallout">
						<div class = "text-center pl-5 pr-5 hpCTA"><?php the_field('call_to_action'); ?></div>
						<?php echo do_shortcode('[et_bloom_inline optin_id="optin_1"]'); ?>
				</div><!-- .hpCallout -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .opacityLayer -->	
</div><!-- .container-fluid -->