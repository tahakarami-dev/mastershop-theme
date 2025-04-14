<?php
// headers
$header_posts = get_posts(
  [
    'post_type'=> 'masterheader',
    'post_status' => 'publish',
    'numberposts' => -1
  ]
);

$headers = array();

foreach($header_posts as $post){
$headers[$post->ID] = $post->post_title;
}

// footers

$footer_posts = get_posts(
  [
    'post_type'=> 'masterfooter',
    'post_status' => 'publish',
    'numberposts' => -1
  ]
);

$footers = array();

foreach($footer_posts as $post){
$footers[$post->ID] = $post->post_title;
}

// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Set a unique slug-like ID
  $prefix = 'master_settings';

  //
  // Create options
  CSF::createOptions($prefix, array(
    'menu_title' => ' مستر شاپ',
    'menu_slug'  => 'master-settings',
    'menu_hidden' => false,
    'framework_title' => 'مستر شاپ ',
 
  ));


  // Create a section
  CSF::createSection($prefix, array(
    'title'  => 'هدر',
    'fields' => array(
      array(
        'id' => 'header-type',
        'type' => 'select',
        'title' => 'نوع هدر ', 
        'placeholder' => 'نوع هدر را انتخاب کنید', 
        'options' => array(
          'default' => 'طرح پیش فرض',
          'elementor' => 'المنتور',
        ),
        'default' => 'default'
      ),
      array(
        'id' => 'header-el',
        'type' => 'select',
        'title' => 'انتخاب هدر ', 
        'placeholder' => 'یک هدر را انتخاب کنید', 
        'options' => $headers,
        'default' => 'default'
      ),
      array(
        'id'    => 'logo',
        'type'  => 'media',
        'title' => 'انتخاب لوگو',
        'dependency'=> array('header-type' , '==' , 'default')

      ),
      array(
        'id'      => 'logo-width',
        'type'    => 'text',
        'title'   => 'سایز لوگو به پیکسل',
        'default' => '150',
        'dependency'=> array('header-type' , '==' , 'default')

      ),

      array(
        'id' => 'auth-btn-type',
        'type' => 'select',
        'title' => 'نوع دکمه حساب کاربری ', 
        'placeholder' => 'نوع دکمه را انتخاب کنید', 
        'options' => array(
          'link' => ' لینک سفارشی',
          'modal' => 'مدال باز شونده',
        ),
        'default' => 'modal',
        'dependency'=> array('header-type' , '==' , 'default')

      ),

      array(
        'id'      => 'auth-title-btn',
        'type'    => 'text',
        'title'   => 'متن دکمه',
        'dependency'=> array('auth-btn-type' , '==' , 'link'),
        'dependency'=> array('header-type' , '==' , 'default')

        
      ),
      array(
        'id'      => 'auth-link-btn',
        'type'    => 'text',
        'title'   => 'لینک دکمه',
        'dependency'=> array('auth-btn-type' , '==' , 'link'),
        'dependency'=> array('header-type' , '==' , 'default')

      ),

      array(
        'id'      => 'phone-number',
        'type'    => 'text',
        'title'   => 'شماره تماس',
        'dependency'=> array('header-type' , '==' , 'default')
        
      ),
      
      
    )
  ));
  CSF::createSection($prefix, array(
    'title'  => 'فوتر',
    'fields' => array(
      array(
        'id' => 'footer-type',
        'type' => 'select',
        'title' => 'نوع فوتر ', 
        'placeholder' => 'نوع فوتر را انتخاب کنید', 
        'options' => array(
          'elementor' => 'المنتور',
        ),
        'default' => 'elementor'
      ),
      array(
        'id' => 'footer-el',
        'type' => 'select',
        'title' => 'انتخاب فوتر ', 
        'placeholder' => 'یک فوتر را انتخاب کنید', 
        'options' => $footers,
        'default' => 'default'
      ),
     
      
    )
  ));
  CSF::createSection($prefix, array(
    'title'  => 'استایل',
    'fields' => array(
      array(
        'id' => 'font-family',
        'type' => 'select',
        'title' => 'انتخاب فونت  ', 
        'placeholder' => 'فونت را انتخاب کنید', 
        'options' => array(
          'iransans' => ' ایران سنس',
        ),
        'default' => 'iransans'
      ),
      array(
        'id'    => 'main-color',
        'type'  => 'color',
        'title' => 'رنگ اصلی سایت',
        'output'=>array(
          'color'=> '.phone-holder .desc ,.main-page-wraper .details i,.details a, .vcard a,.logged-in-as a,#reply-title a,.post-tags a, .master-product-category  a, .variations .reset_variations , .comment-form-rating a , .related .section-title h6  ',
          'background-color'=>'.auth-btn:hover,.header-search-submit,.master-navigation>div>ul>li>a::after,.master-footer-contact .email,.master-footer-title::before,.share-modal a,.comment-form input.submit,.comment-reply-link,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.owl-nav button:hover,.post-thumb .date , .wc-tabs li.active , .related .product_type_variable , .pagination li span,#searchsubmit',
          'border-bottom-color'=> '.master-navigation ul.menu>li ul,ul.menu li.menu-item-has-children.mega-menu>.sub-menu,',
          'border-color' => '.master-single-image .image-additional .slick-slide.slick-current img'
        ),
        'output_important'=> true,
        'default' => '#2947cc'

      ),
      
      
     
      
    )
  ));

  CSF::createSection($prefix, array(
    'title'  => 'بلاگ',
    'fields' => array(

      array(
        'id'    => 'sidebar-blog',
        'type'  => 'switcher',
        'title' => 'فعال سازی سایدبار چسبان نوشته تکی',
        'default'=> true
      ),
      array(
        'id'    => 'social-media-sharing',
        'type'  => 'switcher',
        'title' => ' اشتراک گذاری شبکه های اجتماعی',
        'default'=> true
      ),

      array(
        'id'    => 'related-post',
        'type'  => 'switcher',
        'title' => 'فعال سازی مطالب مرتبط' ,
        'default'=> true
      ),
      array(
        'id'    => 'count-related-post',
        'type'  => 'text',
        'title' => 'تعداد مطالب مرتبط ' ,
        'default'=> 6,
        'dependency' => array( 'related-post', '==', 'true' ),

      ),
      
      
      
   
    )
  ));



}

function master_settings($key = '')
{
    $options = get_option('master_settings');
    return isset($options[$key]) ? $options[$key] : null;
}


