<?php
/**
 * section-services.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!--Services-->
<section class="container willer-services">
  <?php
  $willer_pagename_services = esc_attr(get_theme_mod('wl_pagename_services'));
  $willer_args = array(
    'page_id'=> $willer_pagename_services ,
    'posts_per_page'=> 1, );
    $willer_services_page = new WP_Query( $willer_args );
    if( $willer_services_page->have_posts() ) :
      while( $willer_services_page->have_posts() ) : $willer_services_page->the_post();?>
      <div class="title-willer-services">
        <a href="<?php the_permalink();?>"><h2><?php the_title_attribute(); ?></h2></a>
        <div class="divide-willer-services"></div>
        <h3><?php the_excerpt();?></h3>
      </div>
        <div class="row">
        <?php
        $willer_services_cat = esc_attr( get_theme_mod('willer_category_services'));
        $willer_args = array(
          'cat' => $willer_services_cat ,
          'posts_per_page'=> 6, );
          $willer_post_page_services = new WP_Query( $willer_args);
          if( $willer_post_page_services->have_posts() ) :
            while ( $willer_post_page_services->have_posts() ) : $willer_post_page_services->the_post();
            $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_big');?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 wl-text-center-media">
              <div class="our-willer-services-wrapper">
                <div class="willer-services-inner">
                  <div class="our-willer-services-img">
                    <?php echo the_post_thumbnail(); ?>
                  </div>
                  <div class="our-willer-services-text">
                    <a href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                    <?php the_excerpt();?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata Post Page Services ?>
      </div>
    </section>
    <?php endwhile;
endif;
wp_reset_postdata(); // End postdata Page Services?>
