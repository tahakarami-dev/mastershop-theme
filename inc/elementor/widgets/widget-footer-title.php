<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Footer_Title extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'footer-title';
    }

    public function get_title()
    {
        return '  عنوان سفارشی فوتر';
    }
    public function get_icon()
    {
        return 'eicon-heading';
    }
    public function get_categories()
    {
        return ['master-footer-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'footer_title_section',
            [
                'label' => 'تنظیمات عنوان سفارشی  ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'عنوان',
            ]
        );

        $this->add_control(
            'text-bold',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'عنوان بولد',
            ]
        );




        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
?>

        <h3 class="master-footer-title">
            <span style="14px">            <?php echo esc_html( $settings['text'] ) ?>
            </span>
            <span class="bold-title"> <?php echo esc_html( $settings['text-bold'] ) ?></span>
        </h3>

<?php


    }
}
