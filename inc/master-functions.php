<?php

defined('ABSPATH') || exit('No Access !!!');


function master_page_title()
{
    $search = get_query_var('s');
    $title = '';


    // If there is a post
    if ((is_home() && !is_front_page()) || (is_page() && !is_front_page()) || is_front_page()) {
        $title = single_post_title('', false);
    }

    if (is_single()) {
     
        if (get_post_type(get_the_ID()) == 'post') {
            $title = the_title();
        }
    }


    // If there's a category or tag
    if (is_category() || is_tag()) {
        $title = single_term_title('', false);
    }

    // If there's a taxonomy
    if (is_tax()) {
        $term = get_queried_object();
        if ($term) {
            $tax = get_taxonomy($term->taxonomy);
            $title = single_term_title('', false);
        }
    }


    // If it's a search
    if (is_search()) {
        /* translators: 1: separator, 2: search phrase */
        $title = esc_html__('Search Results', 'emperor');
    }

    // If it's a 404 page
    if (is_404()) {
        $title = esc_html__('Page not found', 'emperor');
    }

 
    echo esc_html($title);
   
}


function master_get_terms_select($args){

    $terms = get_terms($args);

    $options = [];
    foreach($terms as $term){
        $options[$term->term_id] = $term->name; 
    }

    return $options;

}
