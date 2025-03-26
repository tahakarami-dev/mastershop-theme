<?php
$logo = master_settings('logo');
$account_link  = get_permalink( get_option( 'woocommerce_myaccount_page_id') );
$footer = master_settings('footer-el')
?>
<footer>
<?php
        if($footer){
            $post = get_post($footer);

            if(get_post_status($footer) and get_post_type($footer ) === 'masterfooter' ){
                setup_postdata($footer );
                the_content();
            }

        }

        wp_reset_postdata( );
        
    ?>
</footer>
<div class="master-modal">
    <div class="body">
        <i class="fal fa-xmark x-mark-modal cloes-master-modal"></i>
        <div>
            <img class="logo" width="130px" src="<?php echo esc_url( $logo['url']) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name')  )?>">
            <p class="title">ورود به سایت</p>
            <form class="mt-4" action="<?php echo esc_url($account_link) ?>" method="post">
                <div class="mb-2">
                    <input type="text" class="form-control" placeholder="نام کاربری یا ایمیل " name="username">
                </div>
                <div class="mb-2">
                <input type="password" class="form-control" placeholder="رمز عبور" name="password">
                </div>
                <div class="d-flex mt-3">
                    <a class="lost-password" href="<?php echo esc_url( wp_lostpassword_url( )) ?>">رمز عبور خود را فراموش کردید؟</a>
                </div>
                <div class="mt-3">
                    <?php wp_nonce_field('woocommerce-login')?>
                    <input class="submit" type="submit" value="ورود به سایت" name="login">
                </div>
                <div class="mt-3">
                    <a class="signup" href="<?php echo esc_url($account_link) ?>">عضویت در سایت</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>