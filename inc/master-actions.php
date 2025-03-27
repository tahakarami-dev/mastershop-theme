<?php 

add_action( 'after_setup_theme', 'master_after_setup_theme');

function master_after_setup_theme(){

    add_theme_support('title-tag' );
    register_nav_menus(
        array(
            'main-menu' => 'منو اصلی',
            'phone-menu'=> 'منو موبایل'
        )
    );
}

function master_post_count_view() {
    if (is_single()) {
        global $post;

        if (!isset($_COOKIE['post_viewed_' . $post->ID])) {
            $view_count = get_post_meta($post->ID, '_post_view_count', true);
            $view_count = $view_count ? (int)$view_count : 0;

            // بررسی اینکه آیا مقدار قبلاً در همین بارگذاری صفحه ذخیره شده است
            if (!defined('VIEW_COUNT_UPDATED')) {
                define('VIEW_COUNT_UPDATED', true);
                update_post_meta($post->ID, '_post_view_count', $view_count + 1);
            }

            // ذخیره کوکی برای جلوگیری از شمارش مجدد
            setcookie('post_viewed_' . $post->ID, '1', time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
        }
    }
}
add_action('wp', 'master_post_count_view');
