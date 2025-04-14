<?Php get_header() ?>
<?php
wp_head();
get_header();

$view_count = get_post_meta(get_the_ID(), '_post_view_count', true);
$view_count = $view_count ? $view_count : 0;
?>

<div class="main-page-wraper  single-page">
    <div class="content-section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-2">
                    <?php dynamic_sidebar('blog-sidebar')?>
                </div>
                <div class="col-12 col-md-10">
                    <div class="row">

                        <?php if (have_posts()): ?>
                            <?php while (have_posts()) : the_post() ?>
                                <div class="col-12 col-md-4 mb-4">
                                    <?php get_template_part('/templates/blog/grid') ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <div class="pagination mt-4">
                            <?php echo paginate_links([
                                'type' => 'list',
                                'prev_text' => '<i class="fal fa-angle-right"></i>',
                                'next_text' => '<i class="fal fa-angle-left"></i>',
                            ]) ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
get_footer();
?>
<?php get_footer() ?>