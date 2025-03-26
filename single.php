<?php
wp_head();
get_header();
?>

<div class="top-section">
    <div class="container d-flex flex-column align-items-center">
    <div class="breadcrumbs">
    <?php bcn_display(); ?> 
    </div>
 <h1 class="main-title mt-4"><?php the_title(); ?></h1>
</div>
</div>

<div class="main-page-wraper single-post">
    <div class="content-section">
        <div class="container">
        <article>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail">
                       <?php echo the_post_thumbnail() ;?> 
                    </div>
                <?php endif; ?>
                <div class="post details d-flex align-items-center justify-content-center mt-3 mb-5">
                    <div class="d-flex align-items-center ms-3">
                        <i class="fal fa-calendar"></i>
                        <span>تاریخ انتشار : <?php echo get_the_date() ?></span>
                    </div>
                    <div class="d-flex align-items-center ms-3">
                        <i class="fal fa-eye">
                        </i>
                        <span>تعداد بازدید :‌ ۵</span>

                    </div>
                    <div class="d-flex align-items-center ms-3">
                    <i class="fal fa-user">
                        </i>
                        <span>نویسنده : <?php echo get_the_author()?></span>

                    </div>
                    <div class="d-flex align-items-center ms-3">
                    <i class="fal fa-folder">
                        </i>
                        <span><?php echo get_the_category_list(',') ?></span>

                    </div>
                </div>
                <div class="post-content">
                    <?php the_content() ?> 
                </div>
            <?php endwhile; ?>
        </article>
        </div>
    </div>
</div>

<?php
get_footer();
?>