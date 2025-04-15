<?php
/**
 * Cart Page - Master Redesign
 */
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="master-cart-wrapper">
  <form class="woocommerce-cart-form master-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>
    
    <div class="master-cart-header">
      <h2>سبد خرید</h2>
      <span class="item-count"><?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'woocommerce' ), WC()->cart->get_cart_contents_count() ); ?></span>
    </div>
    
    <div class="master-cart-items">
      <?php do_action( 'woocommerce_before_cart_contents' ); ?>
      
      <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
        $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
        
        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
          $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
          ?>
          <div class="master-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
            
            <div class="product-image">
              <?php
              $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
              if ( $product_permalink ) {
                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
              } else {
                echo $thumbnail;
              }
              ?>
            </div>
            
            <div class="product-details">
              <div class="product-name">
                <?php
                if ( ! $product_permalink ) {
                  echo wp_kses_post( $product_name . '&nbsp;' );
                } else {
                  echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                }
                
             
                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                  echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                }
                ?>
              </div>
              
              <div class="product-price">
                <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
              </div>
              
              <div class="product-quantity">
                <?php
                if ( $_product->is_sold_individually() ) {
                  $min_quantity = 1;
                  $max_quantity = 1;
                } else {
                  $min_quantity = 0;
                  $max_quantity = $_product->get_max_purchase_quantity();
                }
                
                $product_quantity = woocommerce_quantity_input(
                  array(
                    'input_name'   => "cart[{$cart_item_key}][qty]",
                    'input_value'  => $cart_item['quantity'],
                    'max_value'    => $max_quantity,
                    'min_value'    => $min_quantity,
                    'product_name' => $product_name,
                  ),
                  $_product,
                  false
                );
                
                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                ?>
              </div>
              
              <div class="product-subtotal">
                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
              </div>
              
              <div class="product-remove">
                <?php
                echo apply_filters(
                  'woocommerce_cart_item_remove_link',
                  sprintf(
                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4L12 12M4 12L12 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></a>',
                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                    esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
                    esc_attr( $product_id ),
                    esc_attr( $_product->get_sku() )
                  ),
                  $cart_item_key
                );
                ?>
              </div>
            </div>
          </div>
          <?php
        }
      }
      ?>
      
      <?php do_action( 'woocommerce_cart_contents' ); ?>
      
      <div class="master-cart-actions">
        <?php if ( wc_coupons_enabled() ) { ?>
          <div class="coupon">
            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Enter coupon code', 'woocommerce' ); ?>" />
            <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>">
              <?php esc_html_e( 'Apply', 'woocommerce' ); ?>
            </button>
            <?php do_action( 'woocommerce_cart_coupon' ); ?>
          </div>
        <?php } ?>
        
        <button type="submit" class="button update-cart" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
          <?php esc_html_e( 'بروزرسانی سبد خرید ', 'woocommerce' ); ?>
        </button>
        
        <?php do_action( 'woocommerce_cart_actions' ); ?>
        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
      </div>
      
      <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </div>
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
  </form>
  
  <div class="master-cart-collaterals mt-4">
    <?php do_action( 'woocommerce_cart_collaterals' ); ?>
  </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>