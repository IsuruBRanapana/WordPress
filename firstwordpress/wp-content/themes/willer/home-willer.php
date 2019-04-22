<?php
/**
 * Template Name: Home Willer
 * Template Post Type: page
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

 get_header();?> 

 <!-- Static Header  -->
 <?php get_template_part( 'sections/section','static'); ?>

 
 <!-- Services -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_services_section', false) )) : // Function Customize Enable Services Section ?>
 <?php get_template_part( 'sections/section','services');?>
 <?php endif; // End Function Customize Enable Services Section ?>

 <!-- Gallery -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_gallery_section', false) )) : // Function Customize Enable Gallery Section ?>
 <?php get_template_part( 'sections/section','gallery');?>
 <?php endif; // End Function Customize Enable Gallery Section ?>


 <!-- Testimonials carousel -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_testimonials_section', false) )) : // Function Customize Enable Testimonials Section ?>
 <?php get_template_part( 'sections/section','testimonials-carousel');?>
 <?php endif; // End Function Customize Enable Testimonials Section ?>

 <!-- About -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_about_section', false) )) : // Function Customize Enable About Section ?>
 <?php get_template_part( 'sections/section','about');?>
 <?php endif; // End Function Customize Enable About Section ?>

 <!-- Portfolio -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_portfolio_section', false) )) : // Function Customize Enable Portfolio Section ?>
 <?php get_template_part( 'sections/section','portfolio');?>
 <?php endif; // End Function Customize Enable Portfolio Section ?>

<!-- Team -->
<?php if ( false == esc_attr(get_theme_mod( 'wl_enable_team_section', false) )) : // Function Customize Enable Team Section ?>
 <?php get_template_part( 'sections/section','team');?>
 <?php endif; // End Function Customize Enable Team Section ?>

 <!-- Blog -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_blog_section', false) )) : // Function Customize Enable Blog Section ?>
 <?php get_template_part( 'sections/section','blog');?>
 <?php endif; // End Function Customize Enable Blog Section ?>

 <!-- Contact-parallax -->
 <?php if ( false == esc_attr(get_theme_mod( 'wl_enable_contact_parallax_section', false) )) : // Function Customize Enable Contact Parallax Section ?>
 <?php get_template_part( 'sections/section','contact-parallax');?>
 <?php endif; // End Function Customize Enable Contact Parallax Section ?>
 

<!-- Contact -->
<?php get_template_part( 'sections/section','contact'); ?>

 <?php get_footer(); ?>
