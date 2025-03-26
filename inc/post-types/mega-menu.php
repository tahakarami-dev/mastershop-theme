<?php 

function master_megamenu_post_type() {
	register_post_type('mastermenu',
		array(
			'labels'      => array(
				'name'          => 'مگامنو ها ',
				'singular_name' => 'آیتم مگامنو',
				'add_new'=> 'افزودن مگامنو'
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'footer-menu' ),
			'menu_icon'=> MASTER_THEMEURL . 'assets/images/menu.svg' ,

			
		)
	);
}
add_action('init', 'master_megamenu_post_type');
