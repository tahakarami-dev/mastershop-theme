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
                <div class="post-content position-relative">
                    <div class="sticky-side">
                        <div class="post-tags">
                            <div class="">
                                <i class="fal fa-tags"></i>
                                <span>برچسب ها </span>
                            </div>
                            <?php echo get_the_tag_list('',',')  ?>
                        </div>
                        <div class="post-share master-share-open">
                            <div class="">
                                <i class="fal fa-share-nodes"></i>
                                <span>اشتراک گذاری</span>
                            </div>
                        </div>
                    </div>
                    <?php the_content() ?> 
                </div>
            <?php endwhile; ?>
        </article>
        </div>
    </div>
    <div class="master-modal share-modal">
    <div class="body">
        <i class="fal fa-xmark x-mark-modal cloes-share-modal"></i>
        <div>
            <p class="decs">با استفاده از روش های زیر میتوانید این نوشته را به اشتراک بگذارید</p>
            <div class="d-flex aligns-center justify-content-center my-4">
                <a href="https://t.me/share/url?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank"><i class="fa-brands fa-telegram"></i></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"  target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            </div>
            
            <input class="short-link" type="text" value="<?Php echo get_bloginfo('url') . '/?p=' . $post->ID ?> ">

        </div>
    </div>
</div>
</div>

<?php
get_footer();
?>