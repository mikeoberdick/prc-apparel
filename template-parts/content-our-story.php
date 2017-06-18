<div id = "our-story">

<div id="content" class="container-fluid heroContainer" tabindex="-1" style = "background-image: url('<?php the_field('hero_image'); ?>')">
	<div class = "row">
		<div class = "col-sm-12 text-center">
			<?php the_title( '<h1 class="entry-title page_header">', '</h1>' ); ?>
		</div>
	</div><!-- .row -->	
</div><!-- .container-fluid -->

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<p><?php the_field('our_story'); ?></p>
		</div><!-- .col-sm-12 -->
	</div><!-- .row -->

<!-- Where We Started -->
<div class = "pageSection">
	<div class="row">
		<div class = "col-sm-12">
			<h3>Where We Started</h3>
		</div>
	</div>

	<div class = "row">
		<div class="col-sm-6">
			<?php the_field('where_we_started_text'); ?>
		</div><!-- .col-sm-6 -->
			
		<div class="col-sm-6">
			<img src="<?php the_field('where_we_started_image'); ?>" alt="Where We Started">
		</div><!-- .col-sm-6 -->
	</div><!-- .row -->
</div>

<!-- The Boardshorts -->
<div class = "pageSection">
	<div class="row">
		<div class = "col-sm-12">
			<h3>The Boardshort</h3>
		</div>
	</div>

	<div class = "row">
		<div class="col-sm-6">
			<img src="<?php the_field('the_boardshort_image'); ?>" alt="The Boardshort">
		</div><!-- .col-sm-6 -->

		<div class="col-sm-6">
			<?php the_field('the_boardshort_text'); ?>
		</div><!-- .col-sm-6 -->
	</div>
</div>

<!-- The Classic Polo Shirt -->
<div class = "pageSection">
	<div class="row">
		<div class = "col-sm-12">
			<h3>The Classic Polo Shirt</h3>
		</div>
	</div>

	<div class = "row">
		<div class="col-sm-6">
			<?php the_field('the_classic_polo_shirt_text'); ?>
		</div><!-- .col-sm-6 -->
			
		<div class="col-sm-6">
			<img src="<?php the_field('the_classic_polo_shirt_image'); ?>" alt="The Classic Polo Shirt">
		</div><!-- .col-sm-6 -->
	</div><!-- .row -->
</div>

<!-- Inspiration -->
<div class = "pageSection">
	<div class="row">
		<div class = "col-sm-12">
			<h3>Inspiration</h3>
		</div>
	</div>

	<div class = "row">
		<div class="col-sm-6">
			<img src="<?php the_field('inspiration_image'); ?>" alt="Inspiration">
		</div><!-- .col-sm-6 -->

		<div class="col-sm-6">
			<?php the_field('inspiration_text'); ?>
		</div><!-- .col-sm-6 -->
	</div>
</div>

<!-- Team -->
<div class = "pageSection gallery">
	<div class="row">
		<div class = "col-sm-12">
			<h3>Team</h3>
		</div>
	</div>

	<div class = "row">
		<div class="col-sm-12">
			<?php the_field('team_text'); ?>
		</div><!-- .col-sm-12 -->
	</div><!-- .row -->

	<div class = "row">
	<?php 

	$images = get_field('team_photo_gallery');

	if( $images ): ?>
	        <?php foreach( $images as $image ): ?>
	            <div class = "col-md-4">
	                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
	                <p class = "imgCaption"><?php echo $image['caption']; ?></p>
	            </div>
	        <?php endforeach; ?>
	<?php endif; ?>
	</div><!-- .row -->
</div>

</div><!-- .container -->
</div>