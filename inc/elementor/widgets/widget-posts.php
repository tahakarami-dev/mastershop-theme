<?php
defined('ABSPATH') || exit('NO Access');

class Master_Latest_Posts_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'latest-posts';
    }

    public function get_title() {
        return 'آخرین مطالب';
    }
    
    public function get_icon() {
        return 'eicon-post-list';
    }
    
    public function get_categories() {
        return ['master-widgets'];
    }
    
    protected function register_controls() {
        // بخش تنظیمات
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'تنظیمات',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_count',
            [
                'label' => 'تعداد مطالب',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
                'max' => 12,
            ]
        );

        $this->add_control(
            'show_image',
            [
                'label' => 'نمایش تصویر',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'نمایش',
                'label_off' => 'پنهان',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_date',
            [
                'label' => 'نمایش تاریخ',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'نمایش',
                'label_off' => 'پنهان',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label' => 'نمایش خلاصه',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'نمایش',
                'label_off' => 'پنهان',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label' => 'طول خلاصه (کاراکتر)',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
                'condition' => [
                    'show_excerpt' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // استایل‌ها
        $this->start_controls_section(
            'style_section',
            [
                'label' => 'استایل',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => 'رنگ عنوان',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest-post-title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .latest-post-title',
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => 'رنگ خلاصه',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest-post-excerpt' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_excerpt' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => 'رنگ تاریخ',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest-post-date' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_date' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => 'گردی گوشه تصویر',
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .latest-post-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_image' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_count'],
            'post_status' => 'publish',
            'ignore_sticky_posts' => true,
        ];
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            ?>
            <div class="latest-posts-container">
                <div class="latest-posts-grid">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="latest-post-item">
                            <?php if ($settings['show_image'] === 'yes' && has_post_thumbnail()) : ?>
                                <div class="latest-post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="latest-post-content">
                                <h3 class="latest-post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <?php if ($settings['show_date'] === 'yes') : ?>
                                    <div class="latest-post-date">
                                        <?php echo get_the_date(); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($settings['show_excerpt'] === 'yes') : ?>
                                    <div class="latest-post-excerpt">
                                        <?php 
                                        $excerpt = get_the_excerpt();
                                        if (mb_strlen($excerpt) > $settings['excerpt_length']) {
                                            $excerpt = mb_substr($excerpt, 0, $settings['excerpt_length']) . '...';
                                        }
                                        echo wp_kses_post($excerpt);
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
        
    
    }
}