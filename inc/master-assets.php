<?php

defined('ABSPATH') || exit('NO Access');


add_action('wp_enqueue_scripts', 'master_enqueue_scripts');

function master_enqueue_scripts()
{

    $theme_obj = wp_get_theme();
    $theme_version = $theme_obj->get('Version');

    // style 
    wp_enqueue_style('master-bootstarp', MASTER_THEMEURL . 'assets/css/bootstrap.min.css');
    wp_enqueue_style('master-fontawesome', MASTER_THEMEURL . 'assets/css/fontawesome.css');
    wp_enqueue_style('master-fontawesome-light', MASTER_THEMEURL . 'assets/css/light.css');
    wp_enqueue_style('master-fontawesome-brands', MASTER_THEMEURL . 'assets/css/brands.css');

    wp_enqueue_style('master-app', MASTER_THEMEURL . 'assets/css/app.css');
    wp_enqueue_style('master-navigation-style', MASTER_THEMEURL . 'assets/css/navigation.css');

    wp_enqueue_style('master-style', get_stylesheet_uri(  ));

    // fonts
   $font_family = master_settings('font-family');
   wp_enqueue_style('master-font-family', MASTER_THEMEURL . 'assets/fonts/' . $font_family . '.css' , null, $theme_version);






    // scripts 
    wp_enqueue_script('jquery'); // بارگذاری jQuery توسط وردپرس
    wp_enqueue_script('master-popper-js', MASTER_THEMEURL . 'assets/js/popper.min.js', null,  $theme_version, true);
    wp_enqueue_script('master-bootsteap-js', MASTER_THEMEURL . 'assets/js/bootstrap.min.js', null,  $theme_version, true);
    wp_enqueue_script('master-app-js', MASTER_THEMEURL . 'assets/js/app.js',null,  $theme_version, true);

}
