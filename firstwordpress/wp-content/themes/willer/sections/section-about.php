<?php
/**
 * section-about.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!--About-->

<section class="willer-about"> 
  <div class="container-fluid">
    <div class="row effect-img-willer-about">
      <?php
      $willer_about_page = esc_attr( get_theme_mod('wl_pagename_about_home_willer'));
      $willer_args = array(
        'page_id' => $willer_about_page ,
        'posts_per_page'=> 1, );
        $willer_about = new WP_Query($willer_args);
        if( $willer_about->have_posts() ) :
          while ( $willer_about->have_posts() ) : $willer_about->the_post(); ?>
          <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_big');?>
            <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 title-willer-about">
              <div class="willer-text-willer-portfolio">
                <h2><?php the_title_attribute(); ?></h2>
                <div class="divide-willer-about"></div>
                <?php the_excerpt();?><br>
                <button data-animation="animated fadeInRight" class="wl-button-float-left btn btn-1 btn-1c btn-border-willer btn-parallax"><a href="<?php the_permalink();?>"><?php esc_html_e( 'Learn More', 'willer' ); ?></a></button>
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-xs-2"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 div-willer-about" data-aos="fade-up" data-aos-duration="2400">
              <img src="<?php if ( $willer_image_attributes[0] ) :
                echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
              </div>
            <?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata About ?>
      </div>
    </div>
  </section>
