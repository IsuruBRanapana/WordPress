<?php
/**
 * customizer.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 * @param WP_Customize_Manager
 */

 /* TABLE OF CONTENT

 1 - Customizer
     1.1 - Setup default
		 1.2 - General Settings
		 1.3 - Logo
		 1.4 - Category Static Header
		 1.5 - Section Home page Willer
		 1.7 - Social
		 1.8 - Footer - 1.9 Go Pro
 2 - Function Customizer for button-shortcut
 3 - Function javascript for refresh Customizer
 4 - CSS Customize
 5 - Add Class Customizer
 6 - General Sanitization
 7 - Calback Social

*/


/* ------------------------------------------------------ *
##   1 Customizer
/* ------------------------------------------------------ */

function willer_customize_register( $wp_customize ) {

/* ------------------------------------------------------ *
##   1.1 Setup default
/* ------------------------------------------------------ */

$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'willer_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'willer_customize_partial_blogdescription',
	) );
	$wp_customize->selective_refresh->add_partial( 'testo', array(
		'selector'        => 'h6.text-capitalize1',
		'render_callback' => 'willer_customize_partial_testo',
	) );
}

/* ------------------------------------------------------ *
##  1.2 General Settings
/* ------------------------------------------------------ */

$willerGeneralsettings = new Willer_WP_Customize_Panel( $wp_customize, 'willer_generalsettings', array(
	'title'    => __('General Settings','willer'),
	'priority' => 5,
));

$wp_customize->add_panel( $willerGeneralsettings );

// Settings Preloader
$wp_customize->add_section(
	'willer_preloader_section',
	array(
		'title'      => __('Preloader','willer'),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_generalsettings',
));

// Settings Login
$wp_customize->add_section(
	'willer_login_section',
	  array(
		'title'      => __('Login','willer'),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_generalsettings',
));

// Settings Back To Top
$wp_customize->add_section(
	'willer_back_top_section',
	  array(
		'title'      => __('Back To Top','willer'),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_generalsettings',
));

// Enable/Disable Back To Top
$wp_customize->add_setting( 'wl_enable_back_top',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_back_top',
array(
	'label'      => __( 'Enable/Disable Back To Top.','willer' ),
	'description'=> __('Enable or Disable Back To Top.','willer'),
	'section'    => 'willer_back_top_section',
	'priority'   => 10,
)) );

// Enable/Disable Back To Top Smartphone
$wp_customize->add_setting( 'wl_enable_back_top_phone',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_back_top_phone',
array(
	'label'      => __( 'Enable/Disable Back To Top Devices.','willer' ),
	'description'=> __('Enable or Disable Back To Top in mobile devices.','willer'),
	'section'    => 'willer_back_top_section',
	'priority'   => 20,
)) );

// Settings Sidebar Devices
$wp_customize->add_section(
	'willer_sidebar_devices_section',
	array(
		'title'      => __('Sidebar in Devices','willer'),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_generalsettings',
));

// Enable/Disable sidebar devices
$wp_customize->add_setting( 'willer_enable_sidebar_media',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_sidebar_media',
array(
	'label'      => __( 'Enable/Disable sidebar in mobile devices.','willer' ),
	'description'=>__('In the Blog with sidebar Left you can not enable the sidebar in mobile devices!','willer'),
	'section'    => 'willer_sidebar_devices_section',
	'priority'   => 10,
)) );

// Menu Right
$wp_customize->add_section(
		'willer_menu_right_section',
		array(
			'title'      => __('Menu Right','willer'),
			'priority'   => 50,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_generalsettings',
));

// Enable/Disable Menu Right
$wp_customize->add_setting( 'wl_enable_menu_right',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_menu_right',
array(
	'label'      => __( 'Enable/Disable Menu Right.','willer' ),
	'section'    => 'willer_menu_right_section',
	'priority'   => 5,
)) );

// Pagename Menu Right
$wp_customize->add_setting( 'willer_page_id_about_menu_right', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'willer_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'willer_page_id_about_menu_right', array(
	'type'        => 'dropdown-pages',
	'section'     => 'willer_menu_right_section',
	'label'       => __( 'Select Menu Right page.','willer'),
	'description' => __('Select the page for Menu Right.','willer'),
	'priority'    => 10,
) );

// Enable/Disable Social
$wp_customize->add_setting( 'wl_enable_social_menu_right',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_social_menu_right',
array(
	'label'      => __( 'Enable/Disable Social Icons.','willer' ),
	'description'=>__('Enable or Disable Social Icons in Menu Right!','willer'),
	'section'    => 'willer_menu_right_section',
	'priority'   => 20,
)) );

/* --------------------------------------------------------*
##  1.3 Logo
/* --------------------------------------------------------*/

// Enable Effect Rotate Logo

$wp_customize->add_setting( 'willer_enable_rotate_logo',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_rotate_logo',
array(
	'label'    => __( 'Enable/Disable rotation logo','willer' ),
	'section'  => 'title_tagline',
	'priority' => 51,
)) );

$wp_customize->add_setting( 'willer_font_size_logo',
array(
	'default'           => 80,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'willer_sanitize_integer'
));

$wp_customize->add_control( new Willer_Slider_Custom_Control( $wp_customize, 'willer_font_size_logo',
array(
	'label'       => __( 'Font size Logo (px)','willer' ),
	'section'     => 'title_tagline',
	'priority'    => 52,
	'input_attrs' => array(
		'min'       => 50,
		'max'       => 250,
		'step'      => 1,
), )) );

/* ------------------------------------------------------ *
##  1.4 Category Static Header
/* ------------------------------------------------------ */

$wp_customize->add_setting(
	'willer_category_static_header',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_static_header',
		array(
			'label'       => __('Select Category Post for Header Static','willer'),
			'description' => __( 'Select the category for the first posts Header Static in Home page Willer.','willer' ),
			'settings'    => 'willer_category_static_header',
			'section'     => 'header_image',
			'priority'    => 10,
)));

/* ----------------------------------------------------*
##  1.5 Section Home page Willer
/* ----------------------------------------------------*/

$willerSectionHome = new Willer_WP_Customize_Panel( $wp_customize, 'willer_section_home_settings', array(
	'title'    => __('Section Home Willer','willer'),
	'priority' => 6,
));

$wp_customize->add_panel( $willerSectionHome );

// Section Services
$wp_customize->add_section(
		'willer_services_section',
		array(
			'title'      => __('Services','willer'),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Services Section
$wp_customize->add_setting( 'wl_enable_services_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_services_section',
array(
	'label'      => __( 'Enable/Disable Services Section','willer'),
	'section'    => 'willer_services_section',
	'priority'   => 5,
)) );

// Pagename  Services
$wp_customize->add_setting( 'wl_pagename_services', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'willer_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'wl_pagename_services', array(
	'type'        => 'dropdown-pages',
	'section'     => 'willer_services_section',
	'label'       => __( 'Select Services page.','willer'),
	'description' => __('Select the page for Services in Home page Willer.','willer'),
	'priority'    => 10,
) );

// Services
$wp_customize->add_setting(
	'willer_category_services',
	  array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_services',
		array(
			'label'       => __('Select Category Post for Services','willer'),
			'description' => __( 'Select the category for the posts Services in Home page Willer.','willer' ),
			'settings'    => 'willer_category_services',
			'section'     => 'willer_services_section',
			'priority'    => 20,
)));

// Section Gallery
$wp_customize->add_section(
		'willer_gallery_section',
		array(
			'title'      => __('Gallery','willer'),
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Gallery Section
$wp_customize->add_setting( 'wl_enable_gallery_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_gallery_section',
array(
	'label'      => __( 'Enable/Disable Gallery Section','willer'),
	'section'    => 'willer_gallery_section',
	'priority'   => 5,
)) );

// Gallery 1
$wp_customize->add_setting(
	'willer_category_gallery_1',
	array(
		'default'   => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_gallery_1',
		array(
			'label'       => __('Select Category Post for Gallery 1','willer'),
			'description' => __( 'Select the category for the posts Gallery 1 in Home page Willer.','willer' ),
			'settings'    => 'willer_category_gallery_1',
			'section'     => 'willer_gallery_section',
			'priority'    => 10,
)));

// Gallery 2
$wp_customize->add_setting(
	'willer_category_gallery_2',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_gallery_2',
		array(
			'label'       => __('Select Category Post for Gallery 2','willer'),
			'description' => __( 'Select the category for the posts Gallery 2 in Home page Willer.','willer' ),
			'settings'    => 'willer_category_gallery_2',
			'section'     => 'willer_gallery_section',
			'priority'    =>20,
)));

// Gallery 3
$wp_customize->add_setting(
	'willer_category_gallery_3',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_gallery_3',
		array(
			'label'       => __('Select Category Post for Gallery 3','willer'),
			'description' => __( 'Select the category for the posts Gallery 3 in Home page Willer.','willer' ),
			'settings'    => 'willer_category_gallery_3',
			'section'     => 'willer_gallery_section',
			'priority'    =>30,
)));

// Gallery 4
$wp_customize->add_setting(
	'willer_category_gallery_4',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_gallery_4',
		array(
			'label'       => __('Select Category Post for Gallery 4','willer'),
			'description' => __( 'Select the category for the posts Gallery 4 in Home page Willer.','willer' ),
			'settings'    => 'willer_category_gallery_4',
			'section'     => 'willer_gallery_section',
			'priority'    =>40,
)));

// Gallery 5
$wp_customize->add_setting(
	'willer_category_gallery_5',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_gallery_5',
		array(
			'label'       => __('Select Category Post for Gallery 5','willer'),
			'description' => __( 'Select the category for the posts Gallery 5 in Home page Willer.','willer' ),
			'settings'    => 'willer_category_gallery_5',
			'section'     => 'willer_gallery_section',
			'priority'    =>50,
)));

// Gallery 6
$wp_customize->add_setting(
	'willer_category_gallery_6',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_gallery_6',
		array(
			'label'       => __('Select Category Post for Gallery 6','willer'),
			'description' => __( 'Select the category for the posts Gallery 6 in Home page Willer.','willer' ),
			'settings'    => 'willer_category_gallery_6',
			'section'     => 'willer_gallery_section',
			'priority'    =>60,
)));

// Section Testimonials
$wp_customize->add_section(
		'willer_testimonials_section',
		array(
			'title'      => __('Testimonials','willer'),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Testimonials Section
$wp_customize->add_setting( 'wl_enable_testimonials_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_testimonials_section',
array(
	'label'      => __( 'Enable/Disable Testimonials Section','willer'),
	'section'    => 'willer_testimonials_section',
	'priority'   => 5,
)) );

// Category Testimonials
$wp_customize->add_setting(
	'willer_category_testimonials',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_testimonials',
		array(
			'label'       => __('Select Category Post for Testimonials Carousel','willer'),
			'description' => __( 'Select the category for the posts Testimonials Carousel in Home page Willer.','willer' ),
			'settings'    => 'willer_category_testimonials',
			'section'     => 'willer_testimonials_section',
			'priority'    => 10,
)));

// Section About Me
$wp_customize->add_section(
	'willer_about_me_section',
	array(
		'title'      => __('About Me','willer'),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_section_home_settings',
));

// Enable/Disable About Me Section
$wp_customize->add_setting( 'wl_enable_about_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_about_section',
array(
	'label'      => __( 'Enable/Disable About Section','willer'),
	'section'    => 'willer_about_me_section',
	'priority'   => 5,
)) );

// Pagename About
$wp_customize->add_setting( 'wl_pagename_about_home_willer', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'willer_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'wl_pagename_about_home_willer', array(
		'type'        => 'dropdown-pages',
		'section'     => 'willer_about_me_section',
		'label'       => __( 'Select About page.','willer'),
		'description' => __('Select the page for About in Home page Willer.','willer'),
		'priority'    => 10,
) );

// Section Portfolio
$wp_customize->add_section(
		'willer_portfolio_section',
		array(
			'title'      => __('Portfolio','willer'),
			'priority'   => 50,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Portfolio Section
$wp_customize->add_setting( 'wl_enable_portfolio_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_portfolio_section',
array(
	'label'      => __( 'Enable/Disable Portfolio Section','willer'),
	'section'    => 'willer_portfolio_section',
	'priority'   => 5,
)) );

// Portfolio
$wp_customize->add_setting(
	'willer_category_portfolio',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_portfolio',
		array(
			'label'       => __('Select Category Post for Portfolio','willer'),
			'description' => __( 'Select the category for the posts Portfolio in Home page Willer.','willer' ),
			'settings'    => 'willer_category_portfolio',
			'section'     => 'willer_portfolio_section',
			'priority'    => 10,
)));

// Section Team
$wp_customize->add_section(
		'willer_team_section',
		array(
			'title'      => __('Team','willer'),
			'priority'   => 60,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Team Section
$wp_customize->add_setting( 'wl_enable_team_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_team_section',
array(
	'label'      => __( 'Enable/Disable Team Section','willer'),
	'section'    => 'willer_team_section',
	'priority'   => 5,
)) );


// Pagename Team
$wp_customize->add_setting( 'wl_pagename_team', array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'willer_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'wl_pagename_team', array(
	'type'        => 'dropdown-pages',
	'section'     => 'willer_team_section',
	'label'       => __( 'Select Team page.','willer'),
	'description' => __('Select the page for Team in Home page Willer.','willer'),
	'priority'    => 10,
) );

// Categoty Team
$wp_customize->add_setting(
	'willer_category_team',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_team',
		array(
			'label'       => __('Select Category Post for Team','willer'),
			'description' => __( 'Select the category for the posts Team in Home page Willer.','willer' ),
			'settings'    => 'willer_category_team',
			'section'     => 'willer_team_section',
			'priority'    => 20,
)));

// Section Blog
$wp_customize->add_section(
	'willer_blog_section',
	array(
		'title'      => __('Blog','willer'),
		'priority'   => 70,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Blog Section
$wp_customize->add_setting( 'wl_enable_blog_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_blog_section',
array(
	'label'      => __( 'Enable/Disable Blog Section','willer'),
	'section'    => 'willer_blog_section',
	'priority'   => 5,
)) );

// Blog 1
$wp_customize->add_setting(
	'willer_category_blog_1',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_blog_1',
		array(
			'label'       => __('Select Category Post for Blog 1','willer'),
			'description' => __( 'Select the category for the first two posts in Home page Willer.','willer' ),
			'settings'    => 'willer_category_blog_1',
			'section'     => 'willer_blog_section',
			'priority'    => 10,
)));

// Blog 2
$wp_customize->add_setting(
	'willer_category_blog_2',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_blog_2',
		array(
			'label'       => __('Select Category Post for Blog 2','willer'),
			'description' => __( 'Select the category for the second two posts in Home page Willer.','willer' ),
			'settings'    => 'willer_category_blog_2',
			'section'     => 'willer_blog_section',
			'priority'    => 20,
)));

// Title Blog Slider
$wp_customize->add_setting( 'willer_title_blog_slider', array(
	'capability'        => 'edit_theme_options',
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'willer_title_blog_slider', array(
	'type'            => 'text',
	'section'         => 'willer_blog_section',
	'priority'        => 30,
	'label'           => __( 'Title Blog Slider','willer' ),
	'description'     => __('Insert Title for Slider Blog in Home page Willer','willer'),
) );

// Subtitle Blog Slider
$wp_customize->add_setting( 'willer_subtitle_blog_slider', array(
	'capability'        => 'edit_theme_options',
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'willer_subtitle_blog_slider', array(
	'type'            => 'text',
	'section'         => 'willer_blog_section',
	'priority'        => 40,
	'label'           => __( 'Subtitle Blog Slider','willer' ),
	'description'     => __('Insert Subtitle for Slider Blog in Home page Willer','willer'),
) );

// Blog slider
$wp_customize->add_setting(
	'willer_category_blog_slider',
	array(
		'default'           => '',
		'sanitize_callback' => 'willer_sanitize_category_select',
	));

$wp_customize->add_control(
	new Willer_Customize_category_Control(
		$wp_customize,
		'willer_category_blog_slider',
		array(
			'label'       => __('Select Category Post for Blog Slider','willer'),
			'description' => __( 'Select the category for the posts Slider in Home page Willer.','willer' ),
			'settings'    => 'willer_category_blog_slider',
			'section'     => 'willer_blog_section',
			'priority'    => 50,
)));

// Section Parallax
$wp_customize->add_section(
	'willer_contact_section',
	array(
		'title'      => __('Parallax','willer'),
		'priority'   => 80,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_section_home_settings',
));

// Enable/Disable Contact Parallax Section
$wp_customize->add_setting( 'wl_enable_contact_parallax_section',
array(
	'default'           => 0,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_contact_parallax_section',
array(
	'label'      => __( 'Enable/Disable Contact Parallax Section','willer'),
	'section'    => 'willer_contact_section',
	'priority'   => 5,
)) );

 // Pagename Parallax
	$wp_customize->add_setting( 'willer_page_parallax_process', array(
	  'capability'        => 'edit_theme_options',
	  'sanitize_callback' => 'willer_sanitize_dropdown_pages',
	) );

	$wp_customize->add_control( 'willer_page_parallax_process', array(
	  'type'        => 'dropdown-pages',
	  'section'     => 'willer_contact_section',
	  'label'       => __( 'Select name page for Parallax','willer'),
	  'description' => __('Select the page for the Parallax Section in Home page Willer.','willer'),
	) );

// Section Contact
$wp_customize->add_section(
		'willer_contact_footer_section',
		array(
			'title'      => __('Contact','willer'),
			'priority'   => 90,
			'capability' => 'edit_theme_options',
			'panel'      => 'willer_section_home_settings',
));

// Pagename Contact
 $wp_customize->add_setting( 'willer_page_contact', array(
	 'capability'        => 'edit_theme_options',
	 'sanitize_callback' => 'willer_sanitize_dropdown_pages',
 ) );

 $wp_customize->add_control( 'willer_page_contact', array(
	 'type'        => 'dropdown-pages',
	 'section'     => 'willer_contact_footer_section',
	 'label'       => __( 'Select name page for Contact','willer'),
	 'description' => __('Select the page for the Contact Section in Home page Willer.','willer'),
 ) );

/* ----------------------------------------------------------------- *
##  1.7 Social
/* -----------------------------------------------------------------*/

$willerSocial = new Willer_WP_Customize_Panel( $wp_customize, 'willer_social', array(
	'title'    => __('Social','willer'),
	'priority' => 300,
));

$wp_customize->add_panel( $willerSocial );

// Settings Social

$wp_customize->add_section(
	'willer_section_settings_social',
	array(
		'title'      => __('Settings Social','willer'),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_social',
	)
);

// Facebook

$wp_customize->add_setting( 'willer_enable_facebook_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_facebook_social',
array(
	'label'   => __( 'Enable/Disable Facebook.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 10,
)) );

// Url Facebook

$wp_customize->add_setting( 'willer_link_facebook_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_facebook_social',
array(
'label'           => __( 'Link Facebook','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_facebook_social',
'type'            => 'url',
'priority'        => 20,
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Twitter

$wp_customize->add_setting( 'willer_enable_twitter_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_twitter_social',
array(
	'label'   => __( 'Enable/Disable Twitter.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 30,
)) );

// Url Twitter

$wp_customize->add_setting( 'willer_link_twitter_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_twitter_social',
array(
'label'           => __( 'Link Twitter','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_twitter_social',
'priority'        => 40,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Google Plus

$wp_customize->add_setting( 'willer_enable_google_plus_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_google_plus_social',
array(
	'label'   => __( 'Enable/Disable Google Plus.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 50,
)) );

// Url Google Plus

$wp_customize->add_setting( 'willer_link_google_plus_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_google_plus_social',
array(
'label'           => __( 'Link Google Plus','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_google_plus_social',
'priority'        => 60,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Dribbble

$wp_customize->add_setting( 'willer_enable_dribbble_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_dribbble_social',
array(
	'label'   => __( 'Enable/Disable Dribbble.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 70,
)) );

// Url Dribbble

$wp_customize->add_setting( 'willer_link_dribbble_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_dribbble_social',
array(
'label'           => __( 'Link Dribbble','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_dribbble_social',
'priority'        => 80,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Tumblr

$wp_customize->add_setting( 'willer_enable_tumblr_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_tumblr_social',
array(
	'label'   => __( 'Enable/Disable Tumblr.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 90,
)) );

// Url Tumblr

$wp_customize->add_setting( 'willer_link_tumblr_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_tumblr_social',
array(
'label'           => __( 'Link Tumblr','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_tumblr_social',
'priority'        => 100,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Instagram

$wp_customize->add_setting( 'willer_enable_instagram_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_instagram_social',
array(
	'label'   => __( 'Enable/Disable Instagram.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 110,
)) );

// Url Instagram

$wp_customize->add_setting( 'willer_link_instagram_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_instagram_social',
array(
'label'           => __( 'Link Instagram','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_instagram_social',
'priority'        => 120,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder' => __( 'Enter link...','willer' ),
), ));

// Linkedin

$wp_customize->add_setting( 'willer_enable_linkedin_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_linkedin_social',
array(
	'label'   => __( 'Enable/Disable Linkedin.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 130,
)) );

// Url Linkedin

$wp_customize->add_setting( 'willer_link_linkedin_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_linkedin_social',
array(
'label'           => __( 'Link Linkedin','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_linkedin_social',
'priority'        => 140,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Youtube

$wp_customize->add_setting( 'willer_enable_youtube_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_youtube_social',
array(
	'label'   => __( 'Enable/Disable Youtube.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 150,
)) );

// Url Youtube

$wp_customize->add_setting( 'willer_link_youtube_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_youtube_social',
array(
'label'           => __( 'Link Youtube','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_youtube_social',
'priority'        => 160,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Pinterest

$wp_customize->add_setting( 'willer_enable_pinterest_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_pinterest_social',
array(
	'label'   => __( 'Enable/Disable Pinterest.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 170,
)) );

// Url Pinterest

$wp_customize->add_setting( 'willer_link_pinterest_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'willer_link_pinterest_social',
array(
'label'           => __( 'Link Pinterest','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_pinterest_social',
'priority'        => 180,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Flickr

$wp_customize->add_setting( 'willer_enable_flickr_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_flickr_social',
array(
	'label'   => __( 'Enable/Disable Flickr.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 190,
)) );

// Url Flickr

$wp_customize->add_setting( 'willer_link_flickr_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control( 'willer_link_flickr_social',
array(
'label'           => __( 'Link Flickr','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_flickr_social',
'priority'        => 200,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

// Github

$wp_customize->add_setting( 'willer_enable_github_social',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization',
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'willer_enable_github_social',
array(
	'label'   => __( 'Enable/Disable Github.','willer' ),
	'section' => 'willer_section_settings_social',
	'priority'=> 210,
)) );

// Url Github

$wp_customize->add_setting( 'willer_link_github_social',
array(
	'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'willer_link_github_social',
array(
'label'           => __( 'Link Github','willer' ),
'section'         => 'willer_section_settings_social',
'active_callback' => 'willer_enable_github_social',
'priority'        => 210,
'type'            => 'url',
'input_attrs'     => array(
	'class'         => 'my-custom-class',
	'style'         => 'border: 1px solid #2885bb',
	'placeholder'   => __( 'Enter link...','willer' ),
), ));

/* ------------------------------------------------------ *
##  1.8 Footer
/* ------------------------------------------------------ */

$willerFooter = new Willer_WP_Customize_Panel( $wp_customize, 'willer_footer', array(
	'title'    => __('Footer','willer'),
	'priority' => 2000,
));

$wp_customize->add_panel( $willerFooter );

// Settings Footer
$wp_customize->add_section(
	'willer_footer_section',
	array(
		'title'      => __('Settings Footer','willer'),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'willer_footer',
	) );

// Height Footer
$wp_customize->add_setting( 'willer_height_footer',
array(
	'default'           =>550,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'willer_sanitize_integer'
));

$wp_customize->add_control( new Willer_Slider_Custom_Control( $wp_customize, 'willer_height_footer',
array(
	'label'       => __( 'Height Footer (px)','willer' ),
	'section'     => 'willer_footer_section',
	'priority'    => 10,
	'input_attrs' => array(
		'min'       => 300,
		'max'       => 900,
		'step'      => 50,
), )) );

// Column Footer

$wp_customize->add_setting( 'willer_footer_column' , array(
	'default'           => 'col-md-3',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_strip_all_tags',

) );

$wp_customize->add_control(
	'willer_footer_column' ,
	array(
		'label'                  => __( 'Choose the number of columns for the footer widgets', 'willer' ),
		'section'                => 'willer_footer_section',
		'settings'               => 'willer_footer_column',
		'type'                   => 'select',
		'choices'                => array(
			'col-md-12'          => __('1 Column','willer'),
			'col-md-6 '          => __('2 Columns','willer'),
			'col-md-4'           => __('3 Columns','willer'),
			'col-md-3'           => __('4 Columns','willer'),
) ) );

// Enable/Disable Custom Logo
$wp_customize->add_setting( 'wl_enable_custom_logo_footer',
array(
	'default'   => 0,
	'transport' => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_custom_logo_footer',
array(
	'label'   => __( 'Enable/Disable Custom Logo in Footer.','willer' ),
	'section' => 'willer_footer_section',
	'priority'=> 40,
)) );

// Enable/Disable Cuopyright
$wp_customize->add_setting( 'wl_enable_copyright_footer',
array(
	'default'   => 0,
	'transport' => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_copyright_footer',
array(
	'label'   => __( 'Enable/Disable Copyright in Footer.','willer' ),
	'section' => 'willer_footer_section',
	'priority'=> 50,
)) );

// Enable/Disable Social
$wp_customize->add_setting( 'wl_enable_social_footer',
array(
	'default'           => 1,
	'transport'         => 'refresh',
	'sanitize_callback' => 'willer_switch_sanitization'
));

$wp_customize->add_control( new Willer_Toggle_Switch_Custom_control( $wp_customize, 'wl_enable_social_footer',
array(
	'label'   => __( 'Enable/Disable Social in Footer.','willer' ),
	'section' => 'willer_footer_section',
	'priority'=> 60,
)) );

/* ------------------------------------------------------------------------------------------------------------*
## 1.9 Go Pro
/* ------------------------------------------------------------------------------------------------------------*/

	$willerGopro = new Willer_WP_Customize_Panel( $wp_customize, 'willer_go_pro', array(
		'title'    => __('Go Pro','willer'),
		'priority' => 1,
	));

	$wp_customize->add_panel( $willerGopro );

	// Settings Go Pro

	$wp_customize->add_section(
		'willer_section_settings_go_pro',
			array(
				'title'      => __('Willer Pro Version','willer'),
				'priority'   => 10,
				'capability' => 'edit_theme_options',
				'panel'      => 'willer_go_pro',
			));

	$wp_customize->add_setting( 'willer_go_pro_version',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'willer_text_sanitization'
	 )); 

	$wp_customize->add_control( new Willer_Simple_Notice_Custom_control( $wp_customize, 'willer_go_pro_version',
			array(
				'label'       => __( 'WILLER PRO','willer' ),	
				'description' => __( '<p>FOR COMPLETE EXPERIENCE<br>GO TO THE <button><a href="echo esc_url(https://www.denisfranchi.com/willer-theme/)" target="_blank">PRO VERSION</a></p></button>', 'willer' ),
				'section'     => 'willer_section_settings_go_pro'
			)) );

/* End Customizer
------------------------------------------------------------*/
}
add_action( 'customize_register', 'willer_customize_register' );


/* 2 Function Customizer for button-shortcut
------------------------------------------------------------*/


/**
* Site title
*
* @return void
*/
function willer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
* Site tagline
*
* @return void
*/
function willer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/* ------------------------------------------------------------------------- *
##  3 Function javascript for refresh Customizer */
/* ------------------------------------------------------------------------- */

function willer_customize_preview_js() {
	wp_enqueue_script( 'willer-customizer', get_template_directory_uri() . '/js/willer-customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'willer_customize_preview_js' );


/* ------------------------------------------------------------------------- *
##  4 CSS Customize */
/* ------------------------------------------------------------------------- */

function willer_customizer_css() {

	// CSS control Customize

?>

<style>

/* ------------------------------------------------------------------------- *
## Font Size Logo */
/* ------------------------------------------------------------------------- */

.willer-logo-header img{
	width:<?php echo esc_attr( get_theme_mod('willer_font_size_logo', '80')); ?>px ;
}

</style>

<?php

/* ------------------------------------------------------------------------- *
##  Height Footer */
/* ------------------------------------------------------------------------- */

?>

<style>

.willer-footer-effect-parallax {
	height:<?php echo esc_attr( get_theme_mod('willer_height_footer', '550')); ?>px ;
}

.willer-contact,.willer-general-divide-footer{
	margin-bottom: <?php echo esc_attr( get_theme_mod('willer_height_footer', '550')); ?>px ;
}

</style>

<!-- Back to top -->

<?php if ( true == esc_attr( get_theme_mod( 'wl_enable_back_top_phone', false) )) : ?>

  <style>

  @media (max-width: 699px) {

    #backtop{
      display: none!important;
    }

  }
</style>
<?php endif; ?>

<!-- Sidebar devices -->

<?php if ( true == esc_attr( get_theme_mod( 'willer_enable_sidebar_media', false) )) : ?>

  <style>

  @media (max-width: 699px) {

    #secondary{
      display: none!important;
    }

  }
</style>
<?php endif; ?>


<?php
}
add_action( 'wp_footer', 'willer_customizer_css' );

/* ------------------------------------------------------------------------- *
     5 Add Class Customizer */
/* ------------------------------------------------------------------------- */

// Class Add Panel

if ( class_exists( 'WP_Customize_Panel' ) ) {
  class Willer_WP_Customize_Panel extends WP_Customize_Panel {
    public $panel;
    public $type = 'pe_panel';
    public function json() {
      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      return $array;
    }
  }
}
if ( class_exists( 'WP_Customize_Section' ) ) {
  class Willer_WP_Customize_Section extends WP_Customize_Section {
    public $section;
    public $type = 'pe_section';
    public function json() {
      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      if ( $this->panel ) {
        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
      } else {
        $array['customizeAction'] = 'Customizing';
      }
      return $array;
    }
  }
}


//  Class Simple Notice

if (class_exists('WP_Customize_Control')) {

class Willer_Simple_Notice_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'simple_notice';
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'target' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
			'i' => array(
				'class' => array()
			),
			'span' => array(
				'class' => array(),
			),
			'code' => array(),
		);
	?>
		<div class="simple-notice-custom-control">
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
			<?php } ?>
		</div>
	<?php
	}
}
}

//  Class Categoy Control

if (class_exists('WP_Customize_Control')) {
    class willer_Customize_Category_Control extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-category-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;','willer' ),
					'option_none_value' => '0',
                    'selected'          => $this->value(),
                ) );
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                esc_attr($this->label),
                $dropdown
            );
        }
    }
}


// Class Slider custom control

if (class_exists('WP_Customize_Control')) {

  class Willer_Slider_Custom_Control extends WP_Customize_Control {
    /**
    * The type of control being rendered
    */
    public $type = 'slider_control';
    /**
    * Enqueue our scripts and styles
    */
    public function enqueue() {
      wp_enqueue_script( 'willer_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/willer-class-customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
      wp_enqueue_style( 'willer_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/willer-customizer.css', array(), '1.0', 'all' );
    }
    /**
    * Render the control in the customizer
    */
    public function render_content() {
      ?>
      <div class="slider-custom-control">
        <span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
        <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
      </div>
      <?php
    }
  }
}


// Class Toggle Switchs */

if ( class_exists( 'WP_Customize_Control' ) ) {

  class Willer_Toggle_Switch_Custom_control extends WP_Customize_Control {
    /**
    * The type of control being rendered
    */
    public $type = 'toogle_switch';
    /**
    * Enqueue our scripts and styles
    */
    public function enqueue(){
      wp_enqueue_style( 'willer_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/willer-customizer.css', array(), '1.0', 'all' );
    }
    /**
    * Render the control in the customizer
    */
    public function render_content(){
      ?>
      <div class="toggle-switch-control">
        <div class="toggle-switch">
          <input type="checkbox" id="<?php echo esc_url($this->id); ?>" name="<?php echo esc_url($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
          <label class="toggle-switch-label" for="<?php echo esc_url( $this->id ); ?>">
            <span class="toggle-switch-inner"></span>
            <span class="toggle-switch-switch"></span>
          </label>
        </div>
        <span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>
        <?php if( !empty( $this->description ) ) { ?>
          <span class="customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
        <?php } ?>
      </div>
      <?php
    }
  }
}

// Class Alpha Color  */

if (class_exists('WP_Customize_Control')) {
  class Willer_Customize_Alpha_Color_Control extends WP_Customize_Control {
    public $type = 'alpha-color';
    public $palette;
    public $show_opacity;
    public function enqueue() {
      wp_enqueue_script( 'willer_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/willer-class-customizer.js', array( 'jquery', 'wp-color-picker' ), '1.0', true );
      wp_enqueue_style( 'willer_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/willer-customizer.css', array( 'wp-color-picker' ), '1.0', 'all' );
    }
    public function render_content() {
      if ( is_array( $this->palette ) ) {
        $palette = implode( '|', $this->palette );
      } else {
        $palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
      }
      $show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
      ?>
      <label>
        <?php
        if ( isset( $this->label ) && '' !== $this->label ) {
          echo '<span class="customize-control-title">' . esc_attr(sanitize_text_field( $this->label )) . '</span>';
        }
        if ( isset( $this->description ) && '' !== $this->description ) {
          echo '<span class="description customize-control-description">' . esc_attr(sanitize_text_field( $this->description )) . '</span>';
        } ?>
      </label>
      <input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_attr($show_opacity); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
      <?php
    }
  }
}

/* ----------------------------------------------- *
##  6 General Sanitization  */
/* ------------------------------------------------*/


// Slider custom control Sanitization

if ( ! function_exists( 'willer_sanitize_integer' ) ) {
  function willer_sanitize_integer( $input ) {
    return (int) $input;
  }
}


// Sanitize alpha color for Meta Box

function willer_sanitize_rgba( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';
    // If string does not start with 'rgba', then treat as hex
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }
    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
	}


// Saniteze Categories

function willer_sanitize_category_select( $cat_id, $setting) {
	$cat_id = absint($cat_id);
	return is_string(get_the_category_by_ID( $cat_id )) ? $cat_id :  $setting->default;
}


// Toggle switch Sanitization */

if ( ! function_exists( 'willer_switch_sanitization' ) ) {
  function willer_switch_sanitization( $input ) {
    if ( true === $input ) {
      return 1;
    } else {
      return 0;
    }
  }
}


// Saniteze Dropdown Page

function willer_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


// Alpha Color Sanitization for Customizer

if ( ! function_exists( 'willer_hex_rgba_sanitization' ) ) {
  function willer_hex_rgba_sanitization( $input, $setting ) {
    if ( empty( $input ) || is_array( $input ) ) {
      return $setting->default;
    }
    if ( false === strpos( $input, 'rgba' ) ) {
      $input = sanitize_hex_color( $input );
    } else {
      $input = str_replace( ' ', '', $input );
      sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
      $input = 'rgba(' . willer_in_range( $red, 0, 255 ) . ',' . willer_in_range( $green, 0, 255 ) . ',' . willer_in_range( $blue, 0, 255 ) . ',' . willer_in_range( $alpha, 0, 1 ) . ')';
    }
    return $input;
  }
}


// Number Sanitization for Meta Box

if ( ! function_exists( 'willer_in_range' ) ) {
  function willer_in_range( $input, $min, $max ){
    if ( $input < $min ) {
      $input = $min;
    }
    if ( $input > $max ) {
      $input = $max;
    }
    return $input;
  }
}


// Select sanitization function

function willer_sanitize_select( $input, $setting ){
  //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input);
  //get the list of possible select options
  $choices = $setting->manager->get_control( $setting->id )->choices;
  //return input if valid or return default option
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


// Custom Number Sanitization for Customizer

function willer_sanitize_number_absint( $number, $setting ) {
// Ensure $number is an absolute integer (whole number, zero or greater).
$number = absint( $number );
// If the input is an absolute integer, return it; otherwise, return the default
return ( $number ? $number : $setting->default );
}


/* ----------------------------------------------- *
## 7 Calback Social */
/* ------------------------------------------------*/


// Facebook

function willer_enable_facebook_social($control) {
  $option = $control->manager->get_setting('willer_enable_facebook_social');
  return $option->value() == 'willer_link_facebook_social';
}

// Twitter

function willer_enable_twitter_social($control) {
  $option = $control->manager->get_setting('willer_enable_twitter_social');
  return $option->value() == 'willer_link_twitter_social';
}

// Google Plus

function willer_enable_google_plus_social($control) {
  $option = $control->manager->get_setting('willer_enable_google_plus_social');
  return $option->value() == 'willer_link_google_plus_social';
}

// Dribbble

function willer_enable_dribbble_social($control) {
  $option = $control->manager->get_setting('willer_enable_dribbble_social');
  return $option->value() == 'willer_link_dribbble_social';
}

// Tumblr

function willer_enable_tumblr_social($control) {
  $option = $control->manager->get_setting('willer_enable_tumblr_social');
  return $option->value() == 'willer_link_tumblr_social';
}

// Instagram

function willer_enable_instagram_social($control) {
  $option = $control->manager->get_setting('willer_enable_instagram_social');
  return $option->value() == 'willer_link_instagram_social';
}

// Linkedin

function willer_enable_linkedin_social($control) {
  $option = $control->manager->get_setting('willer_enable_linkedin_social');
  return $option->value() == 'willer_link_linkedin_social';
}

// Youtube

function willer_enable_youtube_social($control) {
  $option = $control->manager->get_setting('willer_enable_youtube_social');
  return $option->value() == 'willer_link_youtube_social';
}

// Pinterest

function willer_enable_pinterest_social($control) {
  $option = $control->manager->get_setting('willer_enable_pinterest_social');
  return $option->value() == 'willer_link_pinterest_social';
}

// Flickr

function willer_enable_flickr_social($control) {
  $option = $control->manager->get_setting('willer_enable_flickr_social');
  return $option->value() == 'willer_link_flickr_social';
}

// Github

function willer_enable_github_social($control) {
  $option = $control->manager->get_setting('willer_enable_github_social');
  return $option->value() == 'willer_link_github_social';
}
