<?php

defined('ABSPATH') || exit('NO Access');

add_action('cmb2_admin_init', 'master_cmb2_admin' );


function master_cmb2_admin(){
    $cmb = new_cmb2_box( array(
		'id'            => 'page_metabox',
		'title'         => __('تنظمیات برگه' ),
		'object_types'  => array( 'page', 'post'), 
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	
	) );

    $cmb->add_field( array(
		'name'       => __( 'غیرفعال سازی عنوان صفحه  ' ),
		'desc'       => __('اگر این گزینه فعال باشد عنوان صفحه حذف میگردد'),
		'id'         => '_master_disable_title',
		'type'       => 'checkbox',
	
	) );
}
