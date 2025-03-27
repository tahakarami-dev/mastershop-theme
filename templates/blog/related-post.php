<?php 
global $post;

// بررسی اینکه آیا مقدار ID تنظیم شده است
if (!isset($post->ID)) {
    return;
}

$categories = wp_get_post_categories($post->ID);
$args = [
    'posts_per_page' => 6,
    'post__not_in'   => [$post->ID],
];

if (!empty($categories)) {
    $args['category__in'] = $categories;
}

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
    <div class="related-post my-5">
        <div class="section-title position-relative mb-3">
            <div class="title">
                <div class="d-flex align-items-center">
                    <i class="fal fa-arrows-retweet ms-3"></i>
                    <span>مطالب مرتبط</span>
                </div>
            </div>
        </div>
        <div class="owl-carousel position-relative owl-theme" data-slider-items="3" data-navigation="false" data-loop="true" data-pagination="true">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="item post-inner mb-3">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-thumb position-relative">
                            <span class="date"><?php echo get_the_date();  ?></span>
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
