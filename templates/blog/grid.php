<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <div class="post-inner">
        <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail() ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="post-content">
            <div class="post-title">
                <h2 class="title"><a href=" <?php the_permalink() ?>"><?php the_title() ?></a></h2>
            </div>

            <div class="the-excerpt">
                <?php if (has_excerpt()): ?>
                    <?php the_excerpt(); ?>
                    <?php else:?>
                        <?php echo wp_trim_words(get_the_content() , 15 , '...'); ?>
                <?php endif; ?>
            </div>

            <div class="post-meta d-flex align-items-center my-3">
                <div class="ms-2">
                    <i class="fal fa-pen-line"></i>
                    <span><?php echo get_the_category(get_the_ID( ))[0]->name ?></span>
                </div>
                <div class="ms-2">
                <i class="fal fa-calendar"></i>
                <span><?php echo get_the_date() ?></span>
                </div>
                
            </div>

            <div class="footer-post d-flex align-items-center justify-content-between">
                <div class="">
                    <span>نویسنده : <?php echo get_the_author() ?></span>
                </div>

                <div>
                    <a class="show-more" href="<?php the_permalink() ?>"> بیشتر بخوانید</a>
                </div>
            </div>
        </div>
    </div>
</article>