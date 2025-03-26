<?php

$header_type = master_settings('header-type');
$logo = master_settings('logo');
$logo_width = master_settings('logo-width');
$auth_btn_type = master_settings('auth-btn-type');
$auth_btn_link = master_settings('auth-link-btn');
$auth_btn_title = master_settings('auth-title-btn');
$account_link  = get_permalink(get_option('woocommerce_myaccount_page_id'));
$phone_number = master_settings('phone-number');
$header = master_settings('header-el');




?>
<!DOCTYPE html>
<html <?php echo language_attributes() ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>
<?php echo get_template_part('templates/phone-nav') ?>
<body <?php body_class(); ?>>

    <?php if ($header_type == 'elementor') : ?>
    <?php
        if($header){
            $post = get_post($header);

            if(get_post_status($header) and get_post_type($header ) === 'masterheader' ){
                setup_postdata($header );
                the_content();
            }

        }

        wp_reset_postdata( );
        
    ?>
    <?php else :  ?>
        <header class="main-header">
            <div class="container">
                <div class="d-flex align-items-center py-3 justify-content-between">

                    <div class="d-flex align-items-center">
                        <a href="<?php echo esc_attr(home_url()) ?>">
                            <img class="site-logo" width="<?php echo esc_attr($logo_width) ?>px" src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?> ">
                        </a>

                        <div class="search-holder position-relative me-5 ">
                            <form action="">
                                <input class="form-control header-search-input" type="text" placeholder="دنبال چی میگردی؟">
                                <button class="header-search-submit" type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <a class="cart-btn ms-3" href="">
                            <i class="fal fa-cart-shopping"></i>
                        </a>
                        <div class="d-flex align-items-center ms-3 phone-holder ">
                            <div class="d-flex flex-column">
                                <span class="number"><?php echo esc_html($phone_number) ?></span>
                                <span class="desc">با ما در ارتباط باشید</span>
                            </div>
                            <i class="fal fa-phone-volume me-2 "></i>
                        </div>
                        <?php if ($auth_btn_type == 'link') : ?>
                            <?Php if (is_user_logged_in()):  ?>
                                <a class="auth-btn " href="<?php echo esc_url($account_link) ?>"><i class="fal fa-user ns-1"></i>
                                    پنل کاربری
                                </a>
                            <?Php else: ?>
                                <a class="auth-btn " href=" <?php echo esc_url($auth_btn_link) ?>"><i class="fal fa-user ns-1"></i>
                                    <?php echo esc_html($auth_btn_title) ?>
                                </a>
                            <?Php endif; ?>

                        <?php else : ?>
                            <?Php if (is_user_logged_in()):  ?>
                                <a class="auth-btn " href="<?php echo esc_url($account_link) ?>"><i class="fal fa-user ns-1"></i>
                                    پنل کاربری
                                </a>
                            <?Php else: ?>
                                <a class="auth-btn master-modal-open" href=""><i class="fal fa-user ns-1"></i>
                                    حساب کاربری
                                </a>
                            <?Php endif; ?>

                        <?php endif; ?>

                        <span class="phone-nav-toggle me-3"><i class="fal fa-bars"></i></span>


                    </div>




                </div>

                <div class="pb-3">
                    <div class="master-navigation">
                        <?php wp_nav_menu( [
                            'theme_location'=> 'main-menu',
                            'walker'=> new master_mega_menu_walker(),
                        ]) ?>
                    </div>
                </div>



            </div>

        </header>
    <?php endif; ?>