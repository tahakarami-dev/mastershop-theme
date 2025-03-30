<?php

defined('ABSPATH') || exit('NO Access');

add_action( 'after_setup_theme', 'master_after_setup_theme');

function master_after_setup_theme(){

    add_theme_support('title-tag' );
    add_theme_support('woocommerce' );
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

    register_nav_menus(
        array(
            'main-menu' => 'منو اصلی',
            'phone-menu'=> 'منو موبایل'
        )
    );
}

function master_post_count_view() {
    if (is_singular()) { // تغییر از is_single() به is_singular()
        global $post;

        if (!isset($_COOKIE['post_viewed_' . $post->ID])) {
            $view_count = get_post_meta($post->ID, '_post_view_count', true);
            $view_count = $view_count ? (int)$view_count : 0;

            update_post_meta($post->ID, '_post_view_count', $view_count + 1);

            // ذخیره کوکی برای جلوگیری از شمارش مجدد
            setcookie('post_viewed_' . $post->ID, '1', time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
        }
    }
}
add_action('template_redirect', 'master_post_count_view');
