<?php
/**
 * Veterinary Pet Care functions and definitions
 * @package Veterinary Pet Care
 */

/* Breadcrumb Begin */
function veterinary_pet_care_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'veterinary_pet_care_setup' ) ) :

function veterinary_pet_care_setup() {

	$GLOBALS['content_width'] = apply_filters( 'veterinary_pet_care_content_width', 640 );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('veterinary-pet-care-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'veterinary-pet-care' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css',veterinary_pet_care_font_url() ) );

}
endif;
add_action( 'after_setup_theme', 'veterinary_pet_care_setup' );

/* Theme Widgets Setup */
function veterinary_pet_care_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on blog page sidebar', 'veterinary-pet-care' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on page sidebar', 'veterinary-pet-care' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on page sidebar', 'veterinary-pet-care' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on footer', 'veterinary-pet-care' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on footer', 'veterinary-pet-care' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on footer', 'veterinary-pet-care' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'veterinary-pet-care' ),
		'description'   => __( 'Appears on footer', 'veterinary-pet-care' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'veterinary_pet_care_widgets_init' );

/* Theme Font URL */
function veterinary_pet_care_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Kalam:300,400,700';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/*radio button sanitization*/
 function veterinary_pet_care_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function veterinary_pet_care_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'veterinary_pet_care_loop_columns');
	if (!function_exists('veterinary_pet_care_loop_columns')) {
	function veterinary_pet_care_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Theme enqueue scripts */
function veterinary_pet_care_scripts() {
	wp_enqueue_style( 'veterinary-pet-care-font',veterinary_pet_care_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'veterinary-pet-care-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'veterinary-pet-care-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );
	
	wp_enqueue_script( 'veterinary-pet-care-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('veterinary-pet-care-ie', get_template_directory_uri().'/css/ie.css', array('veterinary-pet-care-basic-style'));
	wp_style_add_data( 'veterinary-pet-care-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'veterinary_pet_care_scripts' );

/* Theme Credit link */
define('VETERINARY_PET_CARE_SITE_URL','https://www.themesglance.com/themes/free-veterinary-pet-wordpress-theme/','veterinary-pet-care');

function veterinary_pet_care_credit_link() {
    echo "<a href=".esc_url(VETERINARY_PET_CARE_SITE_URL)." target='_blank'>".esc_html__('Pet Care WordPress Theme','veterinary-pet-care')."</a>";
}

function veterinary_pet_care_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Social Icons*/
require get_template_directory() . '/inc/social-icon.php';