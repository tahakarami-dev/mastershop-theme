<?php 

function master_footer_post_type() {
	register_post_type('masterfooter',
		array(
			'labels'      => array(
				'name'          => 'فوتر ها ',
				'singular_name' => 'آیتم فوتر',
				'add_new'=> 'افزودن فوتر'
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'footer-header' ),
			'menu_icon'=> MASTER_THEMEURL . 'assets/images/footer.svg' ,

			
		)
	);
}
add_action('init', 'master_footer_post_type');
