<?php
if (!defined('ABSPATH')) {
    exit;
}

$current_user = wp_get_current_user();
$avatar = get_avatar($current_user->ID, 60);
$display_name = $current_user->display_name;

// ترجمه منوها به فارسی
$persian_menu_items = [
    'dashboard'       => ' پیشخوان',
    'orders'         => ' سفارش‌ها',
    'downloads'      => ' دانلودها',
    'edit-address'   => ' آدرس‌ها',
    'edit-account'   => ' جزئیات حساب',
    'customer-logout' => ' خروج'
];
?>

<div class="custom-woo-account-sidebar">
    <div class="custom-woo-user-profile">
        <div class="custom-woo-user-avatar">
            <?php echo $avatar; ?>
        </div>
        <div class="custom-woo-user-info">
            <div class="custom-woo-user-name"><?php echo esc_html($display_name); ?></div>
            <div class="custom-woo-user-welcome">خوش آمدید!</div>
        </div>
    </div>
    
    <nav class="custom-woo-account-menu">
        <ul>
            <?php 
            foreach (wc_get_account_menu_items() as $endpoint => $label):
                $translated_label = $persian_menu_items[$endpoint] ?? $label;
                $classes = wc_get_account_menu_item_classes($endpoint);
            ?>
                <li class="<?php echo esc_attr($classes); ?>">
                    <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                        <?php echo esc_html($translated_label); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>