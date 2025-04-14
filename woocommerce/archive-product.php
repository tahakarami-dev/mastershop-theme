<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

?>
<div class="master-archive-products">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3">
				sidebar
			</div>
			<div class="col-12 col-md-9">
			<div class="row">
				<?php
				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						
						?>
						
						
								<?php wc_get_template_part('content', 'product'); ?>
							
						</div>
						<?php
					}
				}

				woocommerce_product_loop_end();
				?>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php
get_footer('shop');
