<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Phone_Btn extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'phone-btn';
    }

    public function get_title()
    {
        return 'دکمه تماس باما ';
    }
    public function get_icon()
    {
        return 'eicon-call-to-action';
    }
    public function get_categories()
    {
        return ['master-header-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'phone_btn_section',
            [
                'label' => 'تنظیمات دکمه تماس باما ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'phone-number',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'شماره تماس',
              
            ]
        );
        $this->add_control(
            'phone-number-desc',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'توضیحات',
                'default' => 'با ما در تماس باشید '
              
            ]
        );
   

        $this->end_controls_section();
    }
    protected function render()
    {
      $settings =  $this->get_settings_for_display();
      ?>
   <div class="d-flex align-items-center ms-3 phone-holder ">
                            <div class="d-flex flex-column">
                                <span class="number"><?php echo esc_html($settings['phone-number']) ?></span>
                                <span class="desc"><?php echo esc_html($settings['phone-number-desc']) ?></span>
                            </div>
                            <i class="fal fa-phone-volume me-2 "></i>
                        </div>


<?php

      
    }
}
