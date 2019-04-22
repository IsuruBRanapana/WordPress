<?php
/**
 * The Header for our theme.
 * @package Veterinary Pet Care
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'veterinary-pet-care' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5">
          <div class="logo">
            <?php if( has_custom_logo() ){ veterinary_pet_care_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; }?>
          </div>
        </div>
        <div class="col-lg-1 offset-lg-3 offset-md-2 col-md-1">
          <?php if(class_exists('woocommerce')){ ?>
            <li class="cart_box">
              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
            </li>
            <span class="cart_no">
              <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'shopping cart','veterinary-pet-care' ); ?>"><img src="<?php echo esc_html(get_template_directory_uri().'/images/gift.png'); ?>" alt=""></a>
            </span>
          <?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','veterinary-pet-care').'<h6>'; }?>
        </div>
        <div class="search-box col-lg-1 col-md-1 pl-0">
          <span class="search-image"></span>
        </div>
        <div class="col-lg-2 col-md-3 pl-0">
          <div class="request">
            <?php if ( get_theme_mod('veterinary_pet_care_request_link','') != "" ) {?>
              <a href="<?php echo esc_url(get_theme_mod('veterinary_pet_care_request_link','')); ?>"><?php echo esc_html(get_theme_mod('veterinary_pet_care_request_text','')); ?> </a>
            <?php }?>
          </div>
        </div>
      </div>
      <div class="serach_outer">
        <div class="closepop"><i class="far fa-window-close"></i></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','veterinary-pet-care'); ?></a></div>
    <div class="nav">
      <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
    </div>
  </div>
</div>