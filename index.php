<?Php get_header() ?>
<?php
wp_head();
get_header();

$view_count = get_post_meta(get_the_ID(), '_post_view_count', true);
$view_count = $view_count ? $view_count : 0;
?>

<div class="main-page-wraper single-page">
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2">
                    sidebar
                </div>
                <div class="col-12 col-md-10">
                    <div class="row">

                        <?php if (have_posts()): ?>
                            <?php while (have_posts()) : the_post() ?>
                                <div class="col-12 col-md-4">
                                    <?php get_template_part('/templates/blog/grid') ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
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