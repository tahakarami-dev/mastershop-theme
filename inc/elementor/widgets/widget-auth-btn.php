<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Auth_Btn extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'auth-btn';
    }

    public function get_title()
    {
        return 'دکمه حساب کاربری ';
    }
    public function get_icon()
    {
        return 'eicon-user-circle-o';
    }
    public function get_categories()
    {
        return ['master-header-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'auth_btn_section',
            [
                'label' => 'تنظیمات دکمه حساب کاربری',
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

        $auth_btn_type = master_settings('auth-btn-type');
        $auth_btn_link = master_settings('auth-link-btn');
        $auth_btn_title = master_settings('auth-title-btn');
        $account_link  = get_permalink(get_option('woocommerce_myaccount_page_id'));



?>
        <?php if ($auth_btn_type == 'link') : ?>
            <?Php if (is_user_logged_in()):  ?>
                <a class="auth-btn " style="border-radius:<?php echo $settings['border'] ?>px !important ; color:<?php echo $settings['color'] ?>!important; background:<?php echo $settings['back'] ?> !important;" href="<?php echo esc_url($account_link) ?>"><i class="fal fa-user ns-1"></i>
                    پنل کاربری
                </a>
            <?Php else: ?>
                <a class="auth-btn " style="border-radius:<?php echo $settings['border'] ?>px !important ; color:<?php echo $settings['color'] ?>!important; background:<?php echo $settings['back'] ?> !important;" href=" <?php echo esc_url($auth_btn_link) ?>"><i class="fal fa-user ns-1"></i>
                    <?php echo esc_html($auth_btn_title) ?>
                </a>
            <?Php endif; ?>

        <?php else : ?>
            <?Php if (is_user_logged_in()):  ?>
                <a class="auth-btn "  style="border-radius:<?php echo $settings['border'] ?>px !important ; color:<?php echo $settings['color'] ?>!important; background:<?php echo $settings['back'] ?> !important;" href="<?php echo esc_url($account_link) ?>"><i class="fal fa-user ns-1"></i>
                    پنل کاربری
                </a>
            <?Php else: ?>
                <a class="auth-btn master-modal-open" style="border-radius:<?php echo $settings['border'] ?>px !important ; color:<?php echo $settings['color'] ?>!important; background:<?php echo $settings['back'] ?> !important;" href=""><i class="fal fa-user ns-1"></i>
                    حساب کاربری
                </a>
            <?Php endif; ?>

        <?php endif; ?>
<?php
    }
}
