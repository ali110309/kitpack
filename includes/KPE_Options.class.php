<?php
/**
 * @package KPE
 */
defined('ABSPATH') or die();
/**
 * Settings class
 *
 * settings page --> kit pack
 *
 * @since 1.2.0
 */

require_once plugin_dir_path(__FILE__) . '/lib/codestar-framework/codestar-framework.php';

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'kpe';
  
    //
    // Create options
    CSF::createOptions( $prefix, array(
  
      // framework title
      'framework_title'         => 'کیت پک برای المنتور',
      'framework_class'         => '',
  
      // menu settings
      'menu_title'              => 'کیت پک المنتور',
      'menu_slug'               => 'KPE',
      'menu_type'               => 'menu',
      'menu_capability'         => 'manage_options',
      'menu_icon'               => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.44 511.44"><title>KP</title><g id="Layer_2" data-name="Layer 2"><g id="transparent-KP"><path id="KP" d="M255.72,0C114.49,0,0,114.49,0,255.72S114.49,511.44,255.72,511.44,511.44,397,511.44,255.72,397,0,255.72,0ZM154,366.44H88v-222h66Zm58.27,0-57.57-99h67.6l56.71,99Zm9.16-122H154.68q28.35-49.5,56.71-99H279ZM431.23,286Q406.5,311,372.65,311c-3.69,0-9.12-.39-16.28-1.14V242.82q7.49,6,15,6a21.76,21.76,0,0,0,16.2-7,23.09,23.09,0,0,0,6.75-16.6,21.9,21.9,0,0,0-7-16.36,23.28,23.28,0,0,0-16.76-6.75q-23.43,0-23.44,32.38V367.65H286.23V232.25q0-37.27,19.53-60.71a79.9,79.9,0,0,1,28.56-21.48,84.31,84.31,0,0,1,35.56-8q36.28,0,61.19,24.41T456,226.39Q456,260.89,431.23,286Z" style="fill:#fff"/></g></g></svg>'),
      'menu_position'           => null,
      'menu_hidden'             => false,
      'menu_parent'             => '',
  
      // menu extras
      'show_bar_menu'           => true,
      'show_sub_menu'           => false,
      'show_in_network'         => true,
      'show_in_customizer'      => false,
  
      'show_search'             => true,
      'show_reset_all'          => true,
      'show_reset_section'      => true,
      'show_footer'             => true,
      'show_all_options'        => true,
      'show_form_warning'       => true,
      'sticky_header'           => true,
      'save_defaults'           => true,
      'ajax_save'               => true,
  
      // admin bar menu settings
      'admin_bar_menu_icon'     => '',
      'admin_bar_menu_priority' => 80,
  
      // footer
      'footer_text'             => 'طراحی و توسعه: علی رحمانی | پشتیبانی: المنتور پلاس',
      'footer_after'            => '',
      'footer_credit'           => 'قدرت گرفته از "کیت پک" توسط المنتور پلاس',
  
      // database model
      'database'                => '', // options, transient, theme_mod, network
      'transient_time'          => 0,
  
      // contextual help
      'contextual_help'         => array(),
      'contextual_help_sidebar' => '',
  
      // typography options
      'enqueue_webfont'         => true,
      'async_webfont'           => false,
  
      // others
      'output_css'              => true,
  
      // theme and wrapper classname
      'nav'                     => 'normal',
      'theme'                   => 'dark',
      'class'                   => '',
  
      // external default values
      'defaults'                => array(),
  
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'کیت پک',
      'icon'   => 'far fa-smile-wink',
      'fields' => array(
  
        array(
            'type'    => 'content',
            'content' => '<p style="color:red;font-size:14px"> نسخه افزونه: '.  KPE_VERSION . '<p> برای عملکرد بهتر افزونه، همیشه آن را به آخرین نسخه موجود بروزرسانی کنید.</p>' ,
          ),

          array(
            'type'    => 'submessage',
            'style'   => 'info',
            'content' => 'به صورت پیش فرض افزونه کیت پک فونت بخش های مدیریت و المنتور را به "وزیر" تغییر می دهد، در این قسمت می توانید این مورد را غیر فعال کنید.',
          ),
          array(
            'id'    => 'admin-farsi-font',
            'type'  => 'switcher',
            'title' => 'اصلاح فونت مدیریت',
            'text_on'    => 'فعال',
            'text_off'   => 'غیرفعال',
            'subtitle'   => 'تغییر فونت پیشخوان وردپرس به فونت "وزیر" ',
            'default'    => true ,
            'text_width' => 70
          ),
          array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => 'در حال حاضر پیشخوان وردپرس با فونت پیشفرض بارگذاری می شود (پیشنهاد نشده)',
            'dependency' => array( 'admin-farsi-font', '==', 'false' )
          ),
          array(
            'id'    => 'elementor-farsi-font',
            'type'  => 'switcher',
            'title' => 'اصلاح فونت المنتور',
            'text_on'    => 'فعال',
            'text_off'   => 'غیرفعال',
            'subtitle'   => 'تغییر فونت افزونه المنتور به فونت "وزیر" جهت سازگاری بهتر با زبان فارسی ',
            'default'    => true ,
            'text_width' => 70
          ),
          array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => 'در حال حاضر المنتور با فونت پیشفرض بارگذاری می شود (پیشنهاد نشده)',
            'dependency' => array( 'elementor-farsi-font', '==', 'false' )
          ),


      )
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'کیت های آماده المنتور',
      'icon'   => 'fas fa-columns',
      'fields' => array(

        array(
          'type'    => 'content',
          'content' => 'این بخش به زودی فعال می شود' ,
        ),
/*         array(
          'id'    => 'elementor-ready-kits',
          'type'  => 'switcher',
          'title' => 'کیت های آماده و فارسی',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن کیت های آماده و فارسی ',
          'default'    => true ,
          'text_width' => 70
        ),
        array(
          'type'    => 'notice',
          'style'   => 'success',
          'content' => 'در حال حاضر کیت های آماده و فارسی بارگذاری نمی شود.',
          'dependency' => array( 'elementor-ready-kits', '==', 'false' )
        ), */
   
      )
    ) );

    CSF::createSection( $prefix, array(
      'title'  => 'فارسی ساز المنتور',
      'icon'   => 'fas fa-language',
      'fields' => array(
  
        array(
          'type'    => 'content',
          'content' => 'ما سعی کرده ایم ترجمه های تخصصی برای افزونه های المنتور و المنتور پرو آماده کنیم، به صورت پیش فرض این ترجمه ها اعمال می شوند اما می توانید از طریق گزینه های زیر این موارد را غیر فعال نمایید.' ,
        ),
        array(
          'id'    => 'elementor-translate-farsi',
          'type'  => 'switcher',
          'title' => 'فارسی ساز افزونه المنتور',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن ترجمه فارسی افزونه المنتور',
          'default'    => true ,
          'text_width' => 70
        ),
        array(
          'id'    => 'elementor-pro-translate-farsi',
          'type'  => 'switcher',
          'title' => 'فارسی ساز افزونه المنتور پرو',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن ترجمه فارسی افزونه المنتور پرو',
          'default'    => true ,
          'text_width' => 70
        ),
  
      )
    ) );

    CSF::createSection( $prefix, array(
      'title'  => 'فارسی سازی های دیگر',
      'icon'   => 'fas fa-language',
      'fields' => array(
  
        array(
          'type'    => 'content',
          'content' => 'ما سعی کرده ایم ترجمه های تخصصی برای برخی افزودنی های المنتور آماده کنیم، به صورت پیش فرض این ترجمه ها اعمال می شوند اما می توانید از طریق گزینه های زیر این موارد را غیر فعال نمایید.' ,
        ),  
        array(
          'id'    => 'elementskit-lite-translate-farsi',
          'type'  => 'switcher',
          'title' => 'فارسی ساز افزونه المنت کیت لایت',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن ترجمه فارسی افزونه المنت کیت لایت',
          'default'    => true ,
          'text_width' => 70
        ), 
  
      )
    ) );

    CSF::createSection( $prefix, array(
      'title'  => 'آیکن های حرفه ای',
      'icon'   => 'far fa-gem',
      'fields' => array(
        array(
          'type'    => 'content',
          'content' => 'در این قسمت می توانید آیکن های حرفه ای اضافه شده به افزونه المنتور را فعال یا غیر فعال نمایید.' ,
        ),  
        array(
          'type'    => 'notice',
          'style'   => 'warning',
          'content' => 'برای مشاهده لیست آیکن ها می توانید به وب سایت کیت پک مراجعه کنید. <a href="https://kitpack.ir/icons" target="_blank">لیست آیکن ها</a>',
           ),   
        array(
          'id'    => 'elementor-icon-iran',
          'type'  => 'switcher',
          'title' => 'آیکن پک ایرانی',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن آیکن پک ایرانی',
          'default'    => true ,
          'text_width' => 70
        ),
  
      )
    ) );

    CSF::createSection( $prefix, array(
      'title'  => 'فونت های فارسی',
      'icon'   => 'fas fa-language',
      'fields' => array(
  
        array(
          'type'    => 'notice',
          'style'   => 'warning',
          'content' => 'در این قسمت می توانید فونت های فارسی اضافه شده به افزونه المنتور را فعال یا غیر فعال نمایید.</a>',
           ), 
        array(
            'id'    => 'anjoman-font',
            'type'  => 'switcher',
            'title' => 'فونت انجمن',
            'text_on'    => 'فعال',
            'text_off'   => 'غیرفعال',
            'subtitle'   => 'فعال/غیر فعال کردن فونت فارسی انجمن',
            'default'    => true ,
            'text_width' => 70
        ),
        array(
          'id'    => 'vazir-font',
          'type'  => 'switcher',
          'title' => 'فونت وزیر',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن فونت فارسی وزیر',
          'default'    => true ,
          'text_width' => 70
        ),
        array(
          'id'    => 'samim-font',
          'type'  => 'switcher',
          'title' => 'فونت صمیم',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن فونت فارسی صمیم',
          'default'    => true ,
          'text_width' => 70
        ),
        array(
          'id'    => 'shabnam-font',
          'type'  => 'switcher',
          'title' => 'فونت شبنم',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن فونت فارسی شبنم',
          'default'    => true ,
          'text_width' => 70
        ),
        array(
          'id'    => 'mikhak-font',
          'type'  => 'switcher',
          'title' => 'فونت میخک',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن فونت فارسی میخک',
          'default'    => true ,
          'text_width' => 70
        ),
        array(
          'id'    => 'kara-font',
          'type'  => 'switcher',
          'title' => 'فونت کارا',
          'text_on'    => 'فعال',
          'text_off'   => 'غیرفعال',
          'subtitle'   => 'فعال/غیر فعال کردن فونت فارسی کارا',
          'default'    => true ,
          'text_width' => 70
        ),

  
      )
    ) );

    CSF::createSection( $prefix, array(
      'title'  => 'درباره کیت پک',
      'icon'   => 'fas fa-award',
      'fields' => array(
  
        array(
          'type'    => 'content',
          'content' => '
          <h2>افزونه کیت پک المنتور</h2>
          <p>افزونه کیت پک المنتور با هدف آماده کردن تمپلیت های آماده برای سایت ساز المنتور پیاده سازی شده است. <br />
          علاوه بر این سعی کردیم چندین امکان را به صورت یکجا در این افزونه قرار دهیم تا کاربران با نصب یک افزونه اکثر نیاز هایشان در رابطه با استفاده از المنتور برطرف شود.<br />
          همچنین در این افزونه سعی کرده ایم به شما کاربران عزیز حق انتخاب دهیم و بتوانید امکانات را بر اساس نیاز خود فعال و غیر فعال نمایید.<br /><br />
          <strong> علی رحمانی <br />
           <a href="https://kitpack.ir" target="_blank">کیت پک برای المنتور</a>
          </p>
          ',
           ),
           array(
            'type'    => 'content',
            'content' => '<p>برای دریافت پشتیبانی می توانید به <a href="https://kitpack.ir">kitpack.ir</a> مراجعه کنید </p>
            <p>
            <img style="margin: 0 0 -7px 3px;" src=' . KPE_URL . 'includes/assets/img/logo-KP.png /><strong>کیت پک برای المنتور</strong>
            </p>
            ' ,
          ), 
  
      )
    ) );
  
  }
  