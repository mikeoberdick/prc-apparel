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
		<div class="col-sm-12 mb-3">
			<h3>Images</h3>
			<hr>
		</div>
	</div>
<?php $images = get_field('media_images');
if( $images ): ?>
        <?php foreach( $images as $image ): ?>
    <div class="row mb-3 mediaDownloads">
    	<div class="col-sm-4">
    		<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
    	</div>
        <div class = "col-sm-3">
        	<h5><?php echo $image['title']; ?></h5>
        </div>

        <div class="col-sm-5">
        	<a href="<?php echo $image['url']; ?>"><button role = 'button' class = 'mr-2 btn btn-primary'>View Image</button></a>
        	<a href="<?php echo $image['url']; ?>" download><button role = 'button' class = 'btn btn-primary'>Download Image</button></a>
        </div>

    </div><!-- end of row -->
	<?php endforeach; ?>
<?php endif; ?>

<div class = "row">
	<div class="col-sm-12 mb-3">
		<h3>Files</h3>
		<hr>
	</div>
</div>

<?php $files = get_field('media_files');
if( $files ): ?>
        <?php foreach( $files as $file ): ?>
        	<div class="row mb-3 mediaDownloads">
    	<div class="col-sm-4">
    		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
    	</div>
        <div class = "col-sm-3">
        	<h5><?php echo $file['title']; ?></h5>
        </div>

        <div class="col-sm-5">
        	<a href="<?php echo $file['url']; ?>"><button role = 'button' class = 'mr-2 btn btn-primary'>View Image</button></a>
        	<a href="<?php echo $file['url']; ?>" download><button role = 'button' class = 'btn btn-primary'>Download Image</button></a>
        </div>
    </div><!-- end of row -->

	<?php endforeach; ?>
<?php endif; ?>

</div><!-- .container -->
</div><!-- #media -->