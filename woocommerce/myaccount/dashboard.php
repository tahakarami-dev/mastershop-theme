<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// دریافت اطلاعات مورد نیاز
$total_products = wp_count_posts('product')->publish;
$current_user_id = get_current_user_id();

// محصولات خریداری شده توسط کاربر
$customer_orders = wc_get_orders( array(
    'customer_id' => $current_user_id,
    'status'      => 'completed',
    'return'      => 'ids',
    'limit'       => -1,
));
$purchased_products_count = 0;
foreach ($customer_orders as $order_id) {
    $order = wc_get_order($order_id);
    $purchased_products_count += $order->get_item_count();
}

// سفارش های در انتظار پرداخت
$pending_orders = wc_get_orders( array(
    'customer_id' => $current_user_id,
    'status'      => 'pending',
    'return'      => 'ids',
    'limit'       => -1,
));
$pending_orders_count = count($pending_orders);

// موجودی کیف پول کاربر
$wallet_balance = (function_exists('woo_wallet')) ? woo_wallet()->wallet->get_wallet_balance($current_user_id) : 0;


?>



<div class="persian-woo-stats">
    <div class="persian-woo-stat-card">
        <i class="fas fa-box-open"></i>
        <div class="stat-title">تعداد کل محصولات</div>
        <div class="stat-value"><?php echo esc_html($total_products); ?></div>
    </div>
    
    <div class="persian-woo-stat-card">
        <i class="fas fa-shopping-bag"></i>
        <div class="stat-title">محصولات خریداری شده</div>
        <div class="stat-value"><?php echo esc_html($purchased_products_count); ?></div>
    </div>
    
    <div class="persian-woo-stat-card">
        <i class="fas fa-clock"></i>
        <div class="stat-title">سفارش های در انتظار</div>
        <div class="stat-value"><?php echo esc_html($pending_orders_count); ?></div>
    </div>
    
    <div class="persian-woo-stat-card">
        <i class="fas fa-wallet"></i>
        <div class="stat-title">موجودی کیف پول</div>
        <div class="stat-value"><?php echo wc_price($wallet_balance); ?></div>
    </div>
</div>