<?php
defined('ABSPATH') || exit('NO Access');

class Master_Widget_Search_Btn extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'search-btn';
    }

    public function get_title()
    {
        return 'جستجو  ';
    }
    public function get_icon()
    {
        return 'eicon-search';
    }
    public function get_categories()
    {
        return ['master-header-widgets'];
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'search_section',
            [
                'label' => 'تنظیمات جستجو ',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'متن باکس جستجو',
                'default' => 'دنبال چی میگردی؟'
            ]
        );
        $this->add_control(
            'input-height',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'ارتفاع فیلد به پیکسل ',
            ]
        );
        $this->add_control(
            'btn-bg',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => '  پس زمینه دکمه',
            ]
        );
        $this->add_control(
            'btn-padding',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => 'پدینگ دکمه به پیکسل',
            ]
        );




        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
?>

        <div class="search-holder position-relative me-5 ">
            <form action="">
                <input class="form-control header-search-input" style="height: <?php echo $settings['input-height'] ?> background: <?php echo $settings['input-bg'] ?>; "  placeholder="<?php echo esc_html($settings['placeholder']) ?>" >
                <button style="padding:<?php echo $settings['btn-padding'] ?> ; background: <?php echo $settings['btn-bg'] ?> !important" class="header-search-submit" type="submit"><i class="fal fa-search"></i></button>
            </form>
        </div>

        <div class="search-holder position-relative me-5 ">
                            <form action="<?php echo esc_url(home_url('/')) ?>" method="post">
                                <input  style="height: <?php echo $settings['input-height'] ?> background: <?php echo $settings['input-bg'] ?>; "  placeholder="<?php echo esc_html($settings['placeholder']) ?>" name="s" class="form-control header-search-input" type="text" placeholder="دنبال چی میگردی؟">
                                <input type="hidden" name="post_type" value="product">
                                <button style="padding:<?php echo $settings['btn-padding'] ?> ; background: <?php echo $settings['btn-bg'] ?> !important" class="header-search-submit" type="submit"><i class="fal fa-search" class="header-search-submit" type="submit"><i class="fal fa-search"></i></button>
                            </form>
                            <div class="search-result-holder">
                                
                            </div>
                        </div>

<?php


    }
}
