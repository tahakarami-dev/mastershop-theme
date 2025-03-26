<?php 
wp_head(); // برای بارگذاری هدر و اسکریپت‌ها
get_header(); // بارگذاری هدر قالب

if ( have_posts() ) : // بررسی اینکه آیا محتوای برگه وجود دارد
    while ( have_posts() ) : the_post(); // شروع حلقه وردپرس
        the_title('<h1>', '</h1>'); // نمایش عنوان برگه
        the_content(); // نمایش محتوای برگه
    endwhile;
endif;

get_footer(); // بارگذاری فوتر قالب
?>
