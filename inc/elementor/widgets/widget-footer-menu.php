<?php

use Elementor\Repeater;

defined('ABSPATH') || exit('NO Access');


class Master_Widget_Footer_Menu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'footer-menu';
    }

    public function get_title()
    {
        return ' منو فوتر';
    }
    public function get_icon()
    {
        return 'eicon-menu-bar';
    }
    public function get_categories()
    {
        return ['master-footer-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'footerـmenu_section',
            [
                'label' => 'تنظیمات منو فوتر ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => '  عنوان منو  ',
            ]
        );
        $repeater->add_control(
            'url',
            [
                'type' => \Elementor\Controls_Manager::URL,
                'label' =>  'لینک',
            ]
        );
        $this->add_control(
            'links',
            [
                'type' => \Elementor\Controls_Manager::REPEATER,
                'label' => ' آیتم ها منو',
                'fields' => $repeater->get_controls(),

            ]
        );

   

        $this->end_controls_section();
    }
    protected function render()
    {
      $settings =  $this->get_settings_for_display();
      ?>

      <div class="master-footer-menu">
        <ul>
            <?php foreach($settings['links'] as $item): ?>
            <li>
                <a href="<?php echo esc_url($item['url']['url']) ?>"><?php echo $item['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
      </div>


<?php

      
    }
}
