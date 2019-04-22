<?php   
/**
 * @package vstart
 */
 ?>
 <?php
 if ( ! function_exists( 'vstart_setup' ) ) :
function vstart_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'vstart' ),
		'footer' => esc_html__( 'Footer Menu', 'vstart' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	
} 
endif; // vstart_setup
add_action( 'after_setup_theme', 'vstart_setup' );
?>