<?php 

function master_header_post_type() {
	register_post_type('masterheader',
		array(
			'labels'      => array(
				'name'          => 'هدر ها ',
				'singular_name' => 'آیتم هدر',
				'add_new' => 'افزودن هدر',
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'master-header' ),
			'menu_icon'=> MASTER_THEMEURL . 'assets/images/header.svg' ,

			
		)
	);
}
add_action('init', 'master_header_post_type');
