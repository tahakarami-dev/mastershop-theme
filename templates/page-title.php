<?php
$post_id = get_the_ID();
$prefix = '_master_';
$disable_title = get_post_meta($post_id, $prefix . 'disable_title', true);
?>

<?php if (!$disable_title) : ?>
    <?php if (class_exists('WooCommerce') && (is_singular('product')) || is_shop() || is_product_tag() || is_product_category()):  ?>
        <div class="woo-bread my-5">
            <div class="container">
                <div class="d-flex align-items-center ">
                    <i class="fal fa-location-dot ms-2"></i>
                    <?php woocommerce_breadcrumb() ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="top-section <?php echo is_singular('page') ? 'page-single' : '' ?>">
            <div class="container d-flex flex-column align-items-center">
                <div class="breadcrumbs">
                    <?php bcn_display(); ?>
                </div>
                <h1 class="main-title mt-4"><?php the_title(); ?></h1>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>