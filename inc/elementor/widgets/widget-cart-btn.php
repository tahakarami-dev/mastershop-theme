<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Cart_Btn extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cart-btn';
    }

    public function get_title()
    {
        return 'دکمه سبد خرید';
    }
    public function get_icon()
    {
        return 'eicon-cart';
    }
    public function get_categories()
    {
        return ['master-header-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'cart_btn_section',
            [
                'label' => 'تنظیمات دکمه سبد خرید ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'border',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => 'گوشه های گرد به پیکسل',
                'placeholder' => '0',
            ]
        );
        $this->add_control(
            'back',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => 'پس زمینه',
            ]
        );
        $this->add_control(
            'color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => ' رنگ متن',
            ]
        );

   

        $this->end_controls_section();
    }
    protected function render()
    {
      $settings =  $this->get_settings_for_display();
      ?>
   <div class="dropdown">
                            <a data-bs-toggle="dropdown" aria-expanded="false" class="cart-btn ms-3" href="" style="border-radius:<?php echo $settings['border'] ?>px !important ; color:<?php echo $settings['color'] ?>!important; background:<?php echo $settings['back'] ?> !important;">
                                <i class="fal fa-cart-shopping"></i>
                            </a>
                            <div class="dropdown-menu master-cart-drop">
                                <div class="widget woocommerce widget_shopping_cart"><div class="widget_shopping_cart_content"></div></div>
                            </div>
                        </div>
<?php

      
    }
}
