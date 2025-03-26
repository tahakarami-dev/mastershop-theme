<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Menu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'menu';
    }

    public function get_title()
    {
        return 'منو اصلی   ';
    }
    public function get_icon()
    {
        return 'eicon-nav-menu';
    }
    public function get_categories()
    {
        return ['master-header-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'menu_section',
            [
                'label' => 'تنظیمات منو ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

     

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
?>

<div class="master-navigation">
                        <?php wp_nav_menu( [
                            'theme_location'=> 'main-menu',
                            'walker'=> new master_mega_menu_walker(),
                        ]) ?>
                    </div>

<?php


    }
}
