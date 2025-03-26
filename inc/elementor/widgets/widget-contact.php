<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Contact extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'contact';
    }

    public function get_title()
    {
        return ' اطلاعات تماس';
    }
    public function get_icon()
    {
        return 'eicon-call-to-action';
    }
    public function get_categories()
    {
        return ['master-footer-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'contact_section',
            [
                'label' => 'تنظیمات اطلاعات تماس ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'address',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => '   آدرس ',
            ]
        );

        $this->add_control(
            'phone',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => '   شماره تماس ',
            ]
        );

        $this->add_control(
            'email',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => '    ایمیل ',
            ]
        );




        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
?>
        <div class="master-footer-contact">
            <div class="mb-4">
                <i class="fal fa-map-marked-alt">
               <span class="address"> <?php echo esc_html( $settings['address']) ?></span>
                </i>
            </div>
            <div class="mb-4">
            <i class="fal fa-phone-volume">
               <span class="phone"> <?php echo esc_html( $settings['phone']) ?></span>
                </i>
            </div>
          <span class="email"><?php echo esc_html( $settings['email']) ?> </span>
        </div>

<?php


    }
}
