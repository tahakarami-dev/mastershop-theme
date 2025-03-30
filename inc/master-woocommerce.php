<?php

defined('ABSPATH') || exit;


add_action('init', 'master_woo_product');


function master_woo_product()
{

    add_action('woocommerce_single_product_summary', 'master_product_features', 15);
}

function master_product_features()
{
    $original_label =  get_post_meta(get_the_ID(), '_master_original_label', true);
    $stock_label =  get_post_meta(get_the_ID(), '_master_stock_label', true);
    $fast_send =  get_post_meta(get_the_ID(), '_master_fast_send', true);
    $fast_send_message =  get_post_meta(get_the_ID(), '_master_fast_send_message', true);
    $feautres_group =  get_post_meta(get_the_ID(), '_master_feautres_group', true);



    global $product;


?>
    <div class="product_post_meta d-flex align-items-center justify-content-between">
        <div>
            <?php if ($original_label): ?>
                <span class="original_label ms-4">
                    <i class="fal fa-check"></i>
                    محصول اورجینال
                </span>
            <?php endif; ?>

            <?php if ($stock_label): ?>
                <span class="stock_label ms-4">
                    <i class="fal fa-engine-warning"></i>
                    محصول کارکرده
                </span>
            <?php endif; ?>
        </div>
        <?php
        echo wc_get_product_category_list(
            $product->get_id(),
            ', ',
            '<div class="master-product-category d-flex flex-column align-items-center">
        <div> 
            <i class="fal fa-archive ms-1"></i> 
            <span class="category_link">دسته بندی: </span>',
            '</div></div>'
        );
        ?>
    </div>

    <?php if ($fast_send): ?>
        <div class="deliver-alert  d-flex align-items-center mb-3">
            <i class="fal fa-truck-couch ms-3"></i>
            <div class="d-flex flex-column justify-content-center">
                <span class="title"> ارسال سریع </span>
                <span class="message"><?php echo esc_html($fast_send_message) ?> </span>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($feautres_group) : ?>
        <div class="row product-features-list mb-3">
            <div class="title mb-3">
                ویژگی های محصول
            </div>
            <div class="col-12 col-md-6">
                <?php foreach ($feautres_group as $key => $item): ?>
                    <?php if ($key <= 3) : ?>
                        <ul>
                            <li class="mb-3"><?php echo esc_html($item['features_name']) ?></li>
                        </ul>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>


            <div class="col-12 col-md-6">
                <?php foreach ($feautres_group as $key => $item): ?>
                    <?php if ($key > 3) : ?>
                        <ul>
                            <li class="mb-3"><?php echo esc_html($item['features_name']) ?></li>
                        </ul>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>
<?php
}

// اضافه کردن دکمه + قبل از فیلد تعداد
add_action('woocommerce_before_quantity_input_field', 'master_display_plus');
function master_display_plus()
{
    echo '<button type="button" class="qty-button plus">+</button>';
}

// اضافه کردن دکمه - بعد از فیلد تعداد
add_action('woocommerce_after_quantity_input_field', 'master_display_negative');
function master_display_negative()
{
    echo '<button type="button" class="qty-button minus">-</button>';
}
