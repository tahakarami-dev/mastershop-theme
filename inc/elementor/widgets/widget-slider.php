<?php

defined('ABSPATH') || exit('No Access !!!');

class Master_Widget_Simple_Slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'simple-slider';
    }

    public function get_title()
    {

        return 'اسلایدر تصویر';
    }


    public function get_icon()
    {
        return 'eicon-slider-album';
    }

    public function get_categories()
    {
        return ['master-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'simple_slider_section',
            [
                'label' => 'تنظیمات اسلایدر تصویر',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::URL,
                'label' => 'عنوان',
            ]
        );

        $repeater->add_control(
            'link',
            [
                'type' => \Elementor\Controls_Manager::URL,
                'label' => 'لینک',
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => 'انتخاب تصویر',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'slides',
            [
                'type' => \Elementor\Controls_Manager::REPEATER,
                'label' => 'آیتم های اسلایدر',
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{title}}}'
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
    
        if (empty($settings['slides'])) {
            return;
        }
    ?>
        <div class="owl-carousel owl-theme simple-slider" data-slider-items="1" data-navigation="false" data-pagination="false" data-loop="true">
            <?php foreach ($settings['slides'] as $slide): ?>
                <a href="<?php echo esc_url($slide['link']['url']) ?>" class="slide-item">
                    <img src="<?php echo esc_url($slide['image']['url']) ?>" alt="<?php echo esc_attr($slide['title']) ?>">
                </a>
            <?php endforeach; ?>
        </div>
    <?php
    }
    
    }

