<div id = "media">

<div id="content" class="container-fluid heroContainer" tabindex="-1" style = "background-image: url('<?php the_field('hero_image', 26); ?>')">
	<div class = "row">
		<div class = "col-sm-12 text-center">
			<?php the_title( '<h1 class="entry-title page_header">', '</h1>' ); ?>
		</div>
	</div><!-- .row -->	
</div><!-- .container-fluid -->

<div class="container">
	<div class = "row">
		<div class="col-sm-12">
			<h3>Images</h3>	
		</div>
	</div>

<?php $images = get_field('media_images');

if( $images ): $i = 0; ?>
        <?php foreach( $images as $image ): ?>
        	<?php if($i % 3 == 0) { ?>
	<div class="row mediaContent">
 <?php } ?>
            <div class = "col-md-4">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                <h5 class = "mt-3 mb-3 text-center"><?php echo $image['title']; ?></h5>
                <a href="<?php echo $image['url']; ?>" download><button role = 'button' class = 'btn btn-primary btn-lg'>Download Image</button></a>
            </div>
            <?php $i++;
if($i != 0 && $i % 3 == 0) { ?> 
	</div><!-- end of row -->
<?php
} ?>

        <?php endforeach; ?>
<?php endif; ?>

<div class = "row">
		<div class="col-sm-12">
			<h3>Files</h3>	
		</div>
	</div>

<?php $files = get_field('media_files');

if( $files ): $i = 0; ?>
        <?php foreach( $files as $file ): ?>
        	<?php if($i % 3 == 0) { ?>
	<div class="row mediaContent">
 <?php } ?>
            <div class = "col-md-4">
                <h5 class = "mt-3 mb-3 text-center"><?php echo $file['title']; ?></h5>
                <a href="<?php echo $file['url']; ?>" download><button role = 'button' class = 'btn btn-primary btn-lg'>Download File</button></a>
            </div>
            <?php $i++;
if($i != 0 && $i % 3 == 0) { ?> 
	</div><!-- end of row -->
<?php
} ?>

        <?php endforeach; ?>
<?php endif; ?>

</div><!-- .container -->
</div><!-- #media -->