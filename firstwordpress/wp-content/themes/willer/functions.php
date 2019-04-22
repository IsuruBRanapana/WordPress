<?php
/**
 * functions.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

/* TABLE OF CONTENT

 1 - Setup Theme
 2 - Widget area
 3 - Include javascript files
 4 - Include css files
 5 - Add additional templates
 6 - Custom numer of category widget
 7 - Custom Excerpt
 8 - Willer Support Page

*/

/*  1 Setup Theme
------------------------------------------------------------*/

if ( ! function_exists( 'willer_setup' ) ) :
	function willer_setup() {

		// Add Language translation
		load_theme_textdomain( 'willer', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add title-tag
		add_theme_support( 'title-tag' );

		//Add Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// create custom size images
		
		add_image_size('willer_big', 1600, 960, true);
		add_image_size('willer_quad', 290, 250, true);
		add_image_size('willer_single', 800, 500, true);
		add_image_size('willer_gallery', 330, 330, true);
		add_image_size('willer_brands', 520, 520, true);
		add_image_size('willer_team', 600, 800, true);
		add_image_size('willer_contact_parallax', 1800, 600, true);

		//Add Excerpt in Pages
		add_post_type_support( 'page', 'excerpt' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'willer' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'willer_custom_background_args', array(
			'default-color' => '000000',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'willer_setup' );

function willer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'willer_content_width', 640 );
}
add_action( 'after_setup_theme', 'willer_content_width', 0 );

/*  2 Widget area
------------------------------------------------------------*/

// Widget area Sidebar default

function willer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'willer' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'willer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'willer_widgets_init' );

//  Widget area Footer 1

function willer_widgets_footer_1_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'willer' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'willer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'willer_widgets_footer_1_init' );

//  Widget area Footer 2

function willer_widgets_footer_2_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'willer' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'willer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'willer_widgets_footer_2_init' );

//  Widget area Footer 3

function willer_widgets_footer_3_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'willer' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'willer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'willer_widgets_footer_3_init' );

//  Widget area Footer 4

function willer_widgets_footer_4_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'willer' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'willer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'willer_widgets_footer_4_init' );


/*  3 Include javascript files
------------------------------------------------------------*/

function willer_scripts() {

	// Willer script
	wp_enqueue_script( 'willer-custom-script', get_template_directory_uri() . '/js/willer-custom-script.js', array('jquery'), null, true);
	wp_enqueue_script( 'willer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'willer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	// Fixed Menu effect
	wp_enqueue_script( 'float.menu', get_template_directory_uri() . '/js/float-panel.min.js', array(), '2016.10.28.', true );
	// Bootstrap
	wp_enqueue_script('popper-js', get_template_directory_uri() .'/js/popper.min.js', array('jquery'),'1.14.3' ,true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'),'4.1.3' ,true );
	// AOS Animate
	wp_enqueue_script('aos-js',get_template_directory_uri() . '/js/aos.min.js', array(), '2.3.1', false );
	// OWL Carousel
	wp_enqueue_script('owl-carousel-js',get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '2.3.4', true );
  // Add Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'willer_scripts' );


/* 4 Include css files
-------------------------------------------------------- */

if(! function_exists('willer_styles') ) {

	function willer_styles(){
		// Willer defoult style
		wp_enqueue_style( 'willer-style', get_stylesheet_uri() );
		// Bootstrap
		wp_enqueue_style('willer-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');
		// Font Awesome
		wp_enqueue_style('willer-font-awesome', get_template_directory_uri(). '/css/all.min.css');
		// AOS Animate
		wp_enqueue_style('willer-aos-css', get_template_directory_uri(). '/css/aos.min.css');
		// Animate CSS
		wp_enqueue_style('willer-animate-css', get_template_directory_uri(). '/css/animate.min.css');
		// OWL Carousel
	  wp_enqueue_style('willer-owl-carousel-css',get_template_directory_uri() . '/css/owl.carousel.min.css' );

    }
}

add_action('wp_enqueue_scripts', 'willer_styles');


/*  5 Add additional templates
-------------------------------------------------------- */

// Custom Header
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Class Custom Menu.
if ( ! file_exists( get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', esc_html__( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'willer' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php';
}

// Register Custom Comment Walker
if ( ! file_exists( get_template_directory() . '/assets/class-wp-bootstrap-comment-walker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-comment-walker-missing', esc_html__( 'It appears the class-wp-bootstrap-comment-walker.php file may be missing.', 'willer' ) );
} else {
	// file exists... require it.
require_once get_template_directory() . '/assets/class-wp-bootstrap-comment-walker.php';

}


/* 6 Custom numer of category widget
------------------------------------------------------------*/

function willer_add_span_cat_count($links) {

$links = str_replace('</a> (', '</a> <span class="willer-cat-count">(', $links);

$links = str_replace(')', ')</span>', $links);
return $links;
}
add_filter('wp_list_categories', 'willer_add_span_cat_count');

/* 7 Custom Excerpt
------------------------------------------------------------*/


function willer_excerpt_length($length) {
	return 10;

}
add_filter('excerpt_length', 'willer_excerpt_length');


function willer_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'willer' ), get_the_title( get_the_ID() ) )
	);
	return ' ... ' . $link;
}
add_filter( 'excerpt_more', 'willer_excerpt_more' );



 /* 8 Willer Support Page
 ------------------------------------------------------------*/

 add_action('admin_menu', 'willer_page_create');

 function willer_page_create() {
     add_theme_page('Willer', 'WILLER', 'edit_theme_options', 'willer_page', 'willer_page_display','dashicons-universal-access-alt');

 }

 function willer_page_display() {
   require get_template_directory() . '/willer-admin/willer-support.php';

 }

 //Include Admin Style

function willer_load_admin_style($hook) {
    if( $hook == 'appearance_page_willer_page' ) {
     wp_enqueue_style( 'willer_admin_css', get_template_directory_uri() . '/willer-admin/css/willer-admin-style.css', false, '1.0.0' );
		 wp_enqueue_script( 'willer_admin_script', get_template_directory_uri() . '/willer-admin/js/willer-admin-script.js', false, '1.0.0' );
		 wp_enqueue_style( 'willer-font-awesome-admin', get_template_directory_uri() . '/css/all.min.css' );
}
}
add_action( 'admin_enqueue_scripts', 'willer_load_admin_style' );























