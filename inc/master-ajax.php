<?php 

function master_search_ajax(){
    $keyword = sanitize_text_field($_POST['keyword']);

    $the_query = new WP_Query([
        'posts_per_page' => 10,
        's' => $keyword,
        'post_type' => 'product'
    ]);

    if ( $the_query->have_posts() ) {
        ?>
        <ul class="ajax_search_results">
            <?php while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>
                <li>
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('thumbnail'); 
                        } 
                        ?>
                        <span><?php the_title(); ?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <?php
    } else {
        ?>
        <p>محصولی یافت نشد</p>
        <?php
    }
    
    wp_reset_postdata();
    die();
}    
add_action('wp_ajax_master_action_ajax', 'master_search_ajax');
add_action('wp_ajax_nopriv_master_action_ajax', 'master_search_ajax');
