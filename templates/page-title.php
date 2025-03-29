<?php 
$post_id = get_the_ID();
$prefix = '_master_';
$disable_title = get_post_meta($post_id  , $prefix . 'disable_title', true);
?>
<?php if(!$disable_title) :?>
<div class="top-section <?php echo is_singular('page') ? 'page-single' : '' ?>">
    <div class="container d-flex flex-column align-items-center">
    <div class="breadcrumbs">
    <?php bcn_display(); ?> 
    </div>
 <h1 class="main-title mt-4"><?php the_title(); ?></h1>
</div>
</div>
<?php endif; ?>