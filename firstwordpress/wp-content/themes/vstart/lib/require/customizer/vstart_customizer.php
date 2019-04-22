<?php 
add_action( 'customize_register', 'vstart_customize_register_custom_controls', 9 );
function vstart_customize_register_custom_controls( $wp_customize ) {
    get_template_part( 'lib/require/proupgrade/vstart','sectionpro');
}
function vstart_customize_controls_js() {
    $theme = wp_get_theme();
    wp_enqueue_script( 'vstart-customizer-section-pro-jquery', get_template_directory_uri() . '/lib/require/proupgrade/vstart-customize-controls.js', array( 'customize-controls' ), $theme->get( 'Version' ), true );
    wp_enqueue_style( 'vstart-customizer-section-pro', get_template_directory_uri() . '/lib/require/proupgrade/vstart-customize-controls.css', $theme->get( 'Version' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'vstart_customize_controls_js' );
?>
<?php
function vstart_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'vstart_enqueue_comments_reply' );
?>
<?php 
if ( ! function_exists( 'vstart_sanitize_page' ) ) :
    function vstart_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;
function vstart_customize_register($wp_customize){

    // Register custom section types.
    $wp_customize->register_section_type( 'vstart_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section( new vstart_Customize_Section_Pro(
        $wp_customize,
        'theme_go_pro',
        array(
            'priority' => 1,
            'title'    => esc_html__( 'vstart Pro', 'vstart' ),
            'pro_text' => esc_html__( 'Upgrade To Pro', 'vstart' ),
            'pro_url'  => 'https://themestulip.com/themes/vstart-model-wordpress-theme/',
        )
    ) );

        $wp_customize->add_section('vstart_header', array(
        'title'    => esc_html__('vstart Header Phone and Email', 'vstart'),
        'description' => '',
        'priority' => 30,
    ));
    
     $wp_customize->add_section('vstart_social', array(
        'title'    => esc_html__('vstart Social', 'vstart'),
        'description' => '',
        'priority' => 35,
    ));
    
    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('vstart_phone', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
 
    $wp_customize->add_control('vstart_phone', array(
        'label'      => esc_html__('Phone Number', 'vstart'),
        'section'    => 'vstart_header',
        'setting'   => 'vstart_phone',
        'type'    => 'text'
    ));
    
    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('vstart_address_email',array(
            'sanitize_callback' => 'sanitize_email'
    ));
    
    $wp_customize->add_control('vstart_address_email',array(
            'type'  => 'text',
            'label' => __('Add email address here.','vstart'),
            'section'   => 'vstart_header',
            'setting' => 'vstart_address_email'
    ));
       
    //  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('vstart_fb', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('vstart_fb', array(
        'label'      => esc_html__('Facebook', 'vstart'),
        'section'    => 'vstart_social',
        'setting'   => 'vstart_fb',
    ));
    //  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('vstart_twitter', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('vstart_twitter', array(
        'label'      => esc_html__('Twitter', 'vstart'),
        'section'    => 'vstart_social',
        'setting'   => 'vstart_twitter',
    ));
    //  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('vstart_glplus', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('vstart_glplus', array(
        'label'      => esc_html__('Google Plus', 'vstart'),
        'section'    => 'vstart_social',
        'setting'   => 'vstart_glplus',
    ));
    //  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('vstart_in', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('vstart_in', array(
        'label'      => esc_html__('Linkedin', 'vstart'),
        'section'    => 'vstart_social',
        'setting'   => 'vstart_in',
    ));
    

    //  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('vstart_banner', array(
        'title'    => esc_html__('vstart Home slider', 'vstart'),
        'description' => esc_html__('banner Size Should be ( 1600x750 ).','vstart'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('banner1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('banner1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner first:','vstart'),
            'section'   => 'vstart_banner'
    )); 

    $wp_customize->add_setting('banner2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('banner2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner second:','vstart'),
            'section'   => 'vstart_banner'
    )); 

    $wp_customize->add_setting('banner3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('banner3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner third:','vstart'),
            'section'   => 'vstart_banner'
    )); 
// Slider Read More Button Text
    $wp_customize->add_setting('slider_readmore',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('slider_readmore',array( 
            'type'  => 'text',
            'label' => esc_html__('Add slider Read more button name here','vstart'),
            'section'   => 'vstart_banner',
            'setting'   => 'slider_readmore'
    )); // Slider Read More Button Text

//  =============================
    //  = box section              =
    //  =============================
    $wp_customize->add_section('vstart_box', array(
        'title'    => esc_html__('vstart HomePage fashion Box', 'vstart'),
        'description' => esc_html__('Upload image, it will auto crop with 400*250.','vstart'),
        'priority' => 36,
    ));
   
   // Slider Read More Button Text
    $wp_customize->add_setting('boxheading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('boxheading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add box heading','vstart'),
            'section'   => 'vstart_box',
            'setting'   => 'boxheading'
    )); // Slider Read More Button Text

    $wp_customize->add_setting('box1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('box1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box first:','vstart'),
            'section'   => 'vstart_box'
    )); 

    $wp_customize->add_setting('box2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('box2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box second:','vstart'),
            'section'   => 'vstart_box'
    )); 

    $wp_customize->add_setting('box3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('box3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box third:','vstart'),
            'section'   => 'vstart_box'
    )); 

     $wp_customize->add_setting('box4',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'vstart_sanitize_page'
    ));
    
    $wp_customize->add_control('box4',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box fourth:','vstart'),
            'section'   => 'vstart_box'
    )); 


  //  =============================
    //  = Footer              =
    //  =============================

    $wp_customize->add_section('vstart_footer', array(
        'title'    => esc_html__('vstart Footer', 'vstart'),
        'description' => '',
        'priority' => 37,
    ));

	// Footer design and developed
	 $wp_customize->add_setting('vstart_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('vstart_design', array(
        'label'      => esc_html__('Design and developed', 'vstart'),
        'section'    => 'vstart_footer',
        'setting'   => 'vstart_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('vstart_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('vstart_copyright', array(
        'label'      => esc_html__('Copyright', 'vstart'),
        'section'    => 'vstart_footer',
        'setting'   => 'vstart_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'vstart_customize_register');
?>