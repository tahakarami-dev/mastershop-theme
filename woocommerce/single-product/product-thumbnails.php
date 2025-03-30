<?php
global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_image_ids();
$data_product = $product->get_data();
$image_id = $data_product['image_id'] ? $data_product['image_id'] : array();
if ($image_id) {
    array_unshift($attachment_ids, $image_id);
}
if ($attachment_ids) {
    $loop         = 0;
?>
    <div class="master-product-thumbs">

        <div class="master-product-meta">
            <ul>
                <li>
                    <button class="woosc-btn woosc-btn-<?php echo get_the_ID() ?> woosc-btn-has-icon woosc-btn-icon-only" data-id="<?php echo get_the_ID() ?>">
                        <span class="woosc-btn-icon"></span>
                    </button>
                </li>
                <li>
                    <button class="woosw-btn woosw-btn-<?php echo get_the_ID() ?> woosw-btn-has-icon woosw-btn-icon-only" data-id="<?php echo get_the_ID() ?>">
                        <span class="woosw-btn-icon"></span>
                    </button>
                </li>
            </ul>
        </div>

        <div class="image-thumbnail slick-carousel" data-asnavfor=".image-additional" data-columns="1" data-nav="false" ?>
            <?php
            foreach ($attachment_ids as $attachment_id) {
                $image_link = wp_get_attachment_url($attachment_id);
                if (!$image_link) {
                    continue;
                }
                $image_title     = esc_attr(get_the_title($attachment_id));
                $image_caption     = esc_attr(get_post_field('post_excerpt', $attachment_id));
                $image       = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_catalog'), 0, $attr = array(
                    'title' => $image_title,
                    'alt'   => $image_title,
                    'data-zoom-image' => $image_link
                )); ?>
                <div class="img-thumbnail">
                    <span class="img-thumbnail-scroll">
                        <a href="<?php echo $image_link ?>" data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" data-image="<?php echo $image_link ?>">
                            <?php echo $image ?>
                        </a>

                    </span>
                </div>
            <?php $loop++;
            }

            ?>
        </div>
    </div>

<?php
}
