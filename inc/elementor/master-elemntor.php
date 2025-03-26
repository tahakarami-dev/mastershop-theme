<?php

defined('ABSPATH') || exit('NO Access');

function master_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'master-widgets',
		[
			'title' => ' مستر شاپ' ,
			'icon' => 'fa fa-plug',
		]
	);
	$elements_manager->add_category(
		'master-header-widgets',
		[
			'title' => 'هدر مستر شاپ',
			'icon' => 'fa fa-plug',
		]
	);
    $elements_manager->add_category(
		'master-footer-widgets',
		[
			'title' => 'فوتر مستر شاپ',
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'master_add_elementor_widget_categories' );


function master_register_new_widgets( $widgets_manager ) {

	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-auth-btn.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-number-btn.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-cart-btn.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-search-btn.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-menu.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-footer-menu.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-contact.php' );
	require_once( MASTER_THEMEDIR . 'inc/elementor/widgets/widget-footer-title.php' );








	$widgets_manager->register( new \Master_Widget_Auth_Btn() );
	$widgets_manager->register( new \Master_Widget_Cart_Btn() );
	$widgets_manager->register( new \Master_Widget_Search_Btn() );
	$widgets_manager->register( new \Master_Widget_Phone_Btn() );
	$widgets_manager->register( new \Master_Widget_Menu() );
	$widgets_manager->register( new \Master_Widget_Footer_Menu() );
	$widgets_manager->register( new \Master_Widget_Contact() );
	$widgets_manager->register( new \Master_Widget_Footer_Title() );







}
add_action( 'elementor/widgets/register', 'master_register_new_widgets' );