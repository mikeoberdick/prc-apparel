<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
?>

<?php

global $product;
$attachment_ids = $product->get_gallery_attachment_ids();

echo '<div id = "wc_image_gallery" class = "col-sm-12 col-md-6"><ul class="bxslider">';
foreach( $attachment_ids as $attachment_id ) 
{
echo '<li>';
  echo "<img src=" . $image_link = wp_get_attachment_url( $attachment_id, 'large') . ">";
  echo '</li>';
}
echo '</ul></div>';

?>