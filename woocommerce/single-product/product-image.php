<?php
global $post, $woocommerce, $product;
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$full_size_image   = wp_get_attachment_image_src($post_thumbnail_id, 'full');
$image_title       = get_post_field('post_excerpt', $post_thumbnail_id);
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters('woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . $placeholder,
    'images',
));
$attachment_ids = $product->get_gallery_image_ids();


?>
<div class="images">
	<figure class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>">
		<div class="row">

			<div class="">
				<?php do_action('woocommerce_product_thumbnails'); ?>
			</div>

			<div class="">
				<div class="scroll-image">

					<div class="image-additional slick-carousel" data-asnavfor=".image-thumbnail" data-columns="3" data-nav="true">
						<?php
                        $attributes = array(
                            'id'						=> "image",
                            'title'                   => $image_title,
                            'data-src'                => $full_size_image[0],
                            'data-large_image'        => $full_size_image[0],
                            'data-large_image_width'  => $full_size_image[1],
                            'data-large_image_height' => $full_size_image[2],
                        );

$html  = '<div data-thumb="' . get_the_post_thumbnail_url($post->ID, 'shop_thumbnail') . '" class="img-thumbnail woocommerce-product-gallery__image">' .
    '<span class="img-slider-item"> <a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="' . esc_url($full_size_image[0]) . '">';
$html .= get_the_post_thumbnail($post->ID, 'shop_single', $attributes);
$html .= '</a></span>
					</div>';




echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id($post->ID));

?>
						<?php
                    if ($attachment_ids) {
                        $loop 		= 0;
                        foreach ($attachment_ids as $attachment_id) { ?>
								<div class="img-thumbnail">
									<?php $image_link = wp_get_attachment_url($attachment_id);
                            if (!$image_link) {
                                continue;
                            }
                            $image_title 	= esc_attr(get_the_title($attachment_id));
                            $image_caption 	= esc_attr(get_post_field('post_excerpt', $attachment_id));
                            $image       = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_single'), 0, $attr = array(
                                'title' => $image_title,
                                'alt'   => $image_title,
                            ));
                            $image_class = "image-scroll";
                            echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf('<span class="img-slider-item"><a href="%s" data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional"  data-image="%s" class="%s" title="%s">%s</a></span>', $image_link, $image_link, $image_class, $image_caption, $image), $attachment_id, $post->ID, $image_class);
                            ?>
								</div>
						<?php $loop++;
                        }
                    }
?>

					</div>
				</div>
			</div>

		</div>
	</figure>
</div>