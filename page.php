<?php 
wp_head(); 
get_header(); 
?>

<div class="main-page-wraper single-page">
    <div class="content-section">
        <article id="post-<?php the_ID() ?>" <?php post_class() ?> >

            <?php while (have_posts()) : the_post(); ?>
                <div class="post details d-flex align-items-center justify-content-center mt-3 mb-5">
                    <div class="d-flex align-items-center ms-3">
                        <i class="fal fa-calendar"></i>
                        <span>تاریخ انتشار : <?php echo get_the_date() ?></span>
                    </div>
                    <div class="d-flex align-items-center ms-3">
                        <i class="fal fa-eye">
                        </i>
                        <span>تعداد بازدید :‌ 
                            <?php
                            global $post ;
                          echo  get_post_meta($post->ID,'_post_view_count',true);
                            ?>
                        </span>

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
                    <?php the_content() ?> 
                </div>
                <?php if(comments_open() || get_comments_number())  :  ?>
                <div class="comment-post my-5">
                    <div class="section-title position-relative mb-3 ">
                        <div class="title">
                            <div class="d-flex aligns-items-center ">
                                <i class="fal fa-comment-alt-lines ms-3"></i>
                                <span>دیدگاه ها</span>
                            </div>
                        </div>
                    </div>
                    <?php comments_template() ?>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </article>
    </div>
</div>





<?php
get_footer(); 
?>
