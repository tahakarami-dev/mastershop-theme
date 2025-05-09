<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$sub_title = get_post_meta(get_the_ID(), '_master_sub_title', true);

?>

<div class="product-title-holder mb-4">
<h1 class="product_title entry-title mb-3"><?php the_title() ?></h1>
<h3 class="product-sub-title"><?php echo esc_html( $sub_title ) ?></h3>
</div>