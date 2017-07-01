<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="container-fluid">
	<div class="row">

<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

<div class = "product_wrapper col-sm-12 col-md-6">
<?php

	$product_id = isset( $atts['product_id'] ) ? $atts['product_id'] : get_the_ID();
    $cf_funding = get_post_meta( $product_id, '_' . 'alg_crowdfunding_enabled', true );

     if ( $cf_funding === 'yes' ) {
            echo '<div id = "product_details" class = "col-sm-12 col-md-6">';
        }

    else {
        	echo '<div id = "product_details" class="col-sm-12 col-md-6 regProduct">';
        }

        ?>

	<a class = "shop_link" href = "<?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) )?>">Shop</a>

<?php

	$active = get_post_meta( $product_id, '_active', true );

	if ( $active === 'yes' ) {
		do_action( 'woocommerce_single_product_summary' );
		}

	else {
		the_title( '<h1 itemprop="name" class="product_title entry-title">', '</h1>' );

		echo 
			' <!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
			<form action="//prcapparel.us14.list-manage.com/subscribe/post?u=72c444e517c000d0bc8dc2204&amp;id=176610aa0f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div id="mc_embed_signup_scroll">

			<div class="mc-field-group">
			<input type="email" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="e-mail address">
			</div>
			<div id="mce-responses" class="clear">
			<div class="response" id="mce-error-response" style="display:none"></div>
			<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_72c444e517c000d0bc8dc2204_176610aa0f" tabindex="-1" value=""></div>
			<div class="clear"><input type="submit" value="NOTIFY ME" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
			</div>
			</form>
			</div>

			<!--End mc_embed_signup-->';

		}

?>


<?php 
		
	$active = get_post_meta( $product_id, '_active', true );
		
	if ( $active === 'yes' ) { ?>
		<?php
		//Add the estimated shipping date

    global $post;
    $ship_date = get_post_meta( $post->ID, '_ship_date', true );
		    
    if ( $ship_date ) {
        echo '<p id = "estShipping">Estimated Shipping: ' . get_post_meta( $post->ID, '_ship_date', true ) . '</p>';
    }
		    
?>

<div id = "product_links">
<a href="#" class = "sizing_icon" data-featherlight="#sizingInfo"><span>Sizing</span></a>
<div id = "sizingInfo" class = "hidden">

<div class = "row">
<h3 class = "col-sm-12">Sizing</h3>
</div>

<div class = "row">
<div class = "col-sm-12 col-md-8">
	<?php woocommerce_template_single_title(); ?>
	<img src="<?php the_field('hero_image_1'); ?>" />
</div>

<div class = "col-sm-12 col-md-4">
	<p>Your Body – Measurements (inches)</p>
	<p>Please follow the image measurements below.</p>
	<img src = "/wp-content/uploads/2017/06/sizing_chart.jpg" />
</div>
</div>
<?php

if (have_rows('sizes')) {
  while(have_rows('sizes')) {
  the_row();
    $shoulder_array[] = get_sub_field('shoulders');
    $chest_array[] = get_sub_field('chest');
    $length_array[] = get_sub_field('length');
    $sleeve_opening_array[] = get_sub_field('sleeve_opening');
    $waist_array[] = get_sub_field('waist');
  }
}

?>

<?php if ($waist_array[0]): ?>

<div class = "row">
<div class = "col-sm-12 table-responsive">
<h3>Garment Measurements</h3>
<table class="table table-striped">
<tbody>

<tr>
<th scope="row">Waist</th>

<?php 

$rows = get_field('sizes');
if($rows)
{
	foreach($rows as $row)
	{
		echo '<td>' . $row['waist'] . '</td>';
	}
}
?>

</tr>
</tbody>
</table>
</div>
</div>

<div class = "row">
	<div class = "col-sm-12">
		<p><em>Please Note: All measurements were designed with the average CrossFit/athletic body in mind.  If you are in between sizes please size up or down, depending if you like a looser or tighter fit.</em></p>

		<p>For any sizing, styling, a general shoutout, or other inquiries, please contact us at <a href = "mailto:andre@prcapparel.com">andre@prcapparel.com</a>.  We love hearing from you guys!</p>
	</div>
</div>

<?php endif; ?>

<?php if (!$waist_array[0]): ?>

<div class = "row">
<div class = "col-sm-12 table-responsive">
<h3>Garment Measurements</h3>
<table class="table table-striped">
<thead>
<tr>
<th>Size</th>
<th>Small</th>
<th>Medium</th>
<th>Large</th>
<th>X-Large</th>
</tr>
</thead>
<tbody>
<?php if ($shoulder_array[0]): ?>
<tr>
<th scope="row">Shoulder</th>
<td><?php echo $shoulder_array[0]; ?></td>
<td><?php echo $shoulder_array[1]; ?></td>
<td><?php echo $shoulder_array[2]; ?></td>
<td><?php echo $shoulder_array[3]; ?></td>
</tr>
<?php endif; ?>
<?php if ($chest_array[0]): ?>
<tr>
<th scope="row">Chest</th>
<td><?php echo $chest_array[0]; ?></td>
<td><?php echo $chest_array[1]; ?></td>
<td><?php echo $chest_array[2]; ?></td>
<td><?php echo $chest_array[3]; ?></td>
</tr>
<?php endif; ?>
<?php if ($length_array[0]): ?>
<tr>
<th scope="row">Length</th>
<td><?php echo $length_array[0]; ?></td>
<td><?php echo $length_array[1]; ?></td>
<td><?php echo $length_array[2]; ?></td>
<td><?php echo $length_array[3]; ?></td>
</tr>
<?php endif; ?>
<?php if ($sleeve_opening_array[0]): ?>
<tr>
<th scope="row">Sleeve Opening</th>
<td><?php echo $sleeve_opening_array[0]; ?></td>
<td><?php echo $sleeve_opening_array[1]; ?></td>
<td><?php echo $sleeve_opening_array[2]; ?></td>
<td><?php echo $sleeve_opening_array[3]; ?></td>
</tr>
<?php endif; ?>

</tbody>
</table>
</div>
</div>

<div class = "row">
	<div class = "col-sm-12">
		<p><em>Please Note: All measurements were designed with the average CrossFit/athletic body in mind.  If you are in between sizes please size up or down, depending if you like a looser or tighter fit.</em></p>

		<p>For any sizing, styling, a general shoutout, or other inquiries, please contact us at <a href = "mailto:andre@prcapparel.com">andre@prcapparel.com</a>.  We love hearing from you guys!</p>
	</div>
</div>

<?php endif; ?>

</div><!-- #sizingInfo -->

<!-- SHIPPING INFO -->

<a href="#" class = "shipping_icon" data-featherlight="#shippingInfo"><span>Shipping</span></a>
	<div id = "shippingInfo" class = "hidden row">
		<div class = "col-sm-12">
			<?php the_field('shipping_information', 'option'); ?>
		</div>
	</div>


<!-- HELP INFO -->

<a href="#" class = "help_icon" data-featherlight="#helpInfo"><span>Help</span></a>
<div id = "helpInfo" class = "hidden row">
		<div class = "col-sm-12">
			<?php the_field('help_information', 'option'); ?>
		</div>
</div>
			
</div><!-- product links -->

<?php } ?>

	</div><!-- #product_details -->
</div><!-- .product_wrapper -->

</div>
</div><!-- .container-fluid -->

<div id = "product_specs_wrapper" class = "container-fluid">
	<div id = "product_specs" class = "container">
		<div class = "row">
			<div class = "col-sm-12 col-md-4">
				
				<h3>Description</h3>
					<p>
						<!-- display custom description field -->
						<?php echo get_post_meta( $post->ID, '_description', true ); ?>
					</p>

				<h3>Material</h3>
					<p>
						<!-- display custom materials field -->
						<?php echo get_post_meta( $post->ID, '_material', true ); ?>
					</p>
			</div>

			<div class = "col-sm-12 col-md-4">

				<h3>Specifications</h3>
					<p>
						<!-- display custom specifications field -->
						<?php echo get_post_meta( $post->ID, '_specifications', true ); ?>
					</p>

			</div>

			<div class = "col-sm-12 col-md-4">
				<h3>Shop</h3>
				<?php the_field('shop_description', 'option'); ?>
			</div>
		</div>
	</div>
</div><!-- .container-fluid -->

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

<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
