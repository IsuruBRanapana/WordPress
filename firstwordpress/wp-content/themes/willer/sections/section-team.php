<?php
/**
 * section-team.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!--Team-->

<section class="willer-team">
  <div class="container-fluid">
    <div class="row">
      <div class=" col-md-3 col-sm-12 col-xs-12 img-willer-team">
        <?php
        $willer_pagename_team = esc_attr(get_theme_mod('wl_pagename_team'));
        $willerargs = array(
          'page_id'=> $willer_pagename_team ,
          'posts_per_page'=> 1, );
          $willer_team_page = new WP_Query($willerargs);
          if( $willer_team_page->have_posts() ) :
            while ( $willer_team_page->have_posts() ) : $willer_team_page->the_post(); ?>
            <a href="<?php the_permalink();?>"><h2><?php the_title_attribute(); ?></h2></a>
            <div class="divide-willer-team"></div>
            <h3><?php the_excerpt();?></h3>
          <?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata Team page ?>
      </div>
      <?php
      $willer_team_cat = esc_attr( get_theme_mod('willer_category_team'));
      $willer_args = array(
        'cat' => $willer_team_cat ,
        'posts_per_page'=> 3, );
        $willer_team_post = new WP_Query($willer_args);
        if( $willer_team_post->have_posts() ) :
          while ( $willer_team_post->have_posts() ) : $willer_team_post->the_post(); ?>
          <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_team');?>
          <div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12 img-willer-team" data-aos="fade-up" data-aos-duration="3500">
            <div class="grid">
              <figure class="effect-terry">
                <img src="<?php if ( $willer_image_attributes[0] ) :
                  echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
                  <figcaption>
                    <div class="willer-figcaption">
                      <a href="<?php the_permalink();?>"><h2><?php the_title_attribute(); ?></h2></a>
                      <p>
                        <a href="<?php the_permalink();?>"><?php the_excerpt();?></a>
                      </p>
                    </div>
                  </figcaption>
                </figure>
              </div>
            </div>
            <?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata Team post  ?>
      </div>
    </div>
  </section>
