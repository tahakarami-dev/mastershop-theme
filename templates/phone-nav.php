<?php 

$menu = wp_nav_menu( [
    'theme_location'=> 'phone-menu',
    'echo'=> false
]);

?>
<div class="phone-nav">
    <div class="body">
        <?php echo $menu ?>
    </div>
</div>

<div class="phone-overlay"></div>
