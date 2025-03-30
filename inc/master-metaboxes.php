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

	$product_meta = new_cmb2_box( array(
		'id'            => 'product-metabox',
		'title'         => __('تنظمیات اضافی محصول ' ),
		'object_types'  => array( 'product'), 
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	
	) );
	$product_meta->add_field( array(
		'name'       => __( 'زیر عنوان' ),
		'desc'       => __('شما می توانید در این بخش عنوان انگلیسی محصول را وارد نمایید '),
		'id'         => '_master_sub_title',
		'type'       => 'text',
	
	) );
	$product_meta->add_field( array(
		'name'       => __( 'برچسب اورجینال ' ),
		'desc'       => __('با فعال شدن این گزینه برچسب اورچینال در صفحه محصول فعال می شود'),
		'id'         => '_master_original_label',
		'type'       => 'checkbox',
	
	) );
	$product_meta->add_field( array(
		'name'       => __( ' برچسب کارکرده' ),
		'desc'       => __('با فعال شدن این گزینه برچسب کارکرده در صفحه محصول فعال می شود'),
		'id'         => '_master_stock_label',
		'type'       => 'checkbox',
	
	) );
	$product_meta->add_field( array(
		'name'       => __( ' ارسال سریع ' ),
		'desc'       => __('با فعال شدن این گزینه برچسب ارسال سریع  در صفحه محصول فعال می شود'),
		'id'         => '_master_fast_send',
		'type'       => 'checkbox',
	
	) );
	$product_meta->add_field( array(
		'name'       => __( ' متن ارسال سریع ' ),
		'desc'       => __('در این بخش پیغام ارسال سریع محصول را وارد نمایید'),
		'id'         => '_master_fast_send_message',
		'type'       => 'text',
	
	) );

	$feautres_box = new_cmb2_box( array(
		'id'            => 'product-metabox-feautres',
		'title'         => __(' ویژگی های محصول ' ),
		'object_types'  => array( 'product'), 
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	
	) );

	$product_feautres_group = $feautres_box->add_field(array(
        'id'          => '_master_feautres_group',
        'type'        => 'group',
        'description' => __('اضافه کردن ویژگی جدید محصول', 'textdomain'),
        'options'     => array(
            'group_title'   => __('ویژگی {#}', 'textdomain'), // {#} شماره آیتم را نمایش می‌دهد
            'add_button'    => __('افزودن ویژگی جدید', 'textdomain'),
            'remove_button' => __('حذف ویژگی', 'textdomain'),
            'sortable'      => true, // امکان جابه‌جایی آیتم‌ها
        ),
    ));

    // اضافه کردن یک فیلد متنی به گروه (نمونه)
    $feautres_box->add_group_field($product_feautres_group, array(
        'name' => __('عنوان ویژگی ', 'textdomain'),
        'id'   => 'features_name',
        'type' => 'text',
    ));
}
