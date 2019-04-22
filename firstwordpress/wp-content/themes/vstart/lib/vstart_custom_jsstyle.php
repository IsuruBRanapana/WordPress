<?php   
/**
 * @package vstart
 */
 ?>
 <?php function vstart_style_js()
 {
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/require/bootstrap/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');
	wp_enqueue_style( 'vstart-basic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/require/bootstrap/js/bootstrap.js', array('jquery'));	
	wp_enqueue_script( 'vstart-toggle-jquery', get_template_directory_uri() . '/js/vstart-toggle.js', array('jquery'));	
 }
 add_action( 'wp_enqueue_scripts', 'vstart_style_js' );
?>