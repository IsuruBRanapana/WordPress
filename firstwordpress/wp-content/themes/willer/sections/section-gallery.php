<?php
/**
 * section-gallery.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>


<!-- Gallery -->

<section class="gallery-willer" id="willer-section-gallery">
  <div class="container-fluid">
    <div class="row">
      <!-- Gallery 1 -->
      <div class="col-lg-6 col-md-6 col-sm-12 willer-padding-gallery">
        <?php
        $willer_gallery_1_cat = esc_attr( get_theme_mod('willer_category_gallery_1'));
        $willer_args = array(
          'cat' => $willer_gallery_1_cat ,
          'posts_per_page'=> 1, );
          $willer_gallery_1_page = new WP_Query($willer_args);
          if( $willer_gallery_1_page->have_posts() ) :
            while ( $willer_gallery_1_page->have_posts() ) : $willer_gallery_1_page->the_post(); ?>
            <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_big');?>
            <div class="grid-1" data-aos="fade-up" data-aos-duration="1000">
              <div class="caption-large">
                <img src="<?php if ( $willer_image_attributes[0] ) :
                  echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
                  <div class="mask">
                    <a class="info" href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                  </div>
                </div>
              </div>
              <?php endwhile;
          endif;
          wp_reset_postdata(); // End postdata Gallery 1 ?>
        </div>
        <!-- Gallery 2 -->
        <div class="col-lg-3 col-md-3 col-sm-12 willer-padding-gallery">
          <?php
          $willer_gallery_2_cat = esc_attr( get_theme_mod('willer_category_gallery_2'));
          $willer_args = array(
            'cat' =>   $willer_gallery_2_cat ,
            'posts_per_page'=> 1, );
            $willer_gallery_2_page = new WP_Query($willer_args);
            if( $willer_gallery_2_page->have_posts() ) :
              while ( $willer_gallery_2_page->have_posts() ) : $willer_gallery_2_page->the_post(); ?>
              <?php $willer_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_gallery');?>
              <div class="grid-1 img-gallery-smol" data-aos="fade-up" data-aos-duration="1500">
                <div class="caption">
                  <img src="<?php if ( $willer_image_attributes[0] ) :
                    echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>"class="img-fluid"/>
                    <div class="mask">
                      <a class="info" href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                    </div>
                  </div>
                </div>
                <?php endwhile;
            endif;
            wp_reset_postdata(); // End postdata Gallery 2 ?>
          </div>
          <!-- Gallery 3 -->
          <div class="col-lg-3 col-md-3 col-sm-12 willer-padding-gallery">
            <?php
            $willer_gallery_3_cat = esc_attr( get_theme_mod('willer_category_gallery_3'));
            $willer_args = array(
              'cat' => $willer_gallery_3_cat ,
              'posts_per_page'=> 1, );
              $willer_gallery_3_page = new WP_Query($willer_args);
              if( $willer_gallery_3_page->have_posts() ) :
                while ( $willer_gallery_3_page->have_posts() ) : $willer_gallery_3_page->the_post(); ?>
                <?php $willer_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_gallery');?>
                <div class="grid-1 img-gallery-smol" data-aos="fade-up" data-aos-duration="2000">
                  <div class="caption">
                    <img src="<?php if ( $willer_image_attributes[0] ) :
                      echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
                      <div class="mask">
                        <a class="info" href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                      </div>
                    </div>
                  </div>
                  <?php endwhile;
              endif;
              wp_reset_postdata(); // End postdata Gallery 3 ?>
            </div>
          </div>
        <div class="row">
          <!-- Gallery 4 -->
          <div class="col-md-3 col-sm-12 willer-padding-gallery">
            <?php
            $willer_gallery_4_cat = esc_attr( get_theme_mod('willer_category_gallery_4'));
            $willer_args = array(
              'cat' => $willer_gallery_4_cat ,
              'posts_per_page'=> 1, );
              $willer_gallery_4_page = new WP_Query($willer_args);
              if( $willer_gallery_4_page->have_posts() ) :
                while ( $willer_gallery_4_page->have_posts() ) : $willer_gallery_4_page->the_post(); ?>
                <?php $willer_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_gallery');?>
                <div class="grid-1 img-gallery-smol" data-aos="fade-up" data-aos-duration="1000">
                  <div class="caption">
                    <img src="<?php if ( $willer_image_attributes[0] ) :
                      echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
                      <div class="mask">
                        <a class="info" href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                      </div>
                    </div>
                  </div>
                  <?php endwhile;
              endif;
              wp_reset_postdata(); // End postdata Gallery 4 ?>
            </div>
            <!-- Gallery 5 -->
            <div class="col-md-3 col-sm-12 willer-padding-gallery">
              <?php
              $willer_gallery_5_cat = esc_attr( get_theme_mod('willer_category_gallery_5'));
              $willer_args = array(
                'cat' => $willer_gallery_5_cat ,
                'posts_per_page'=> 1, );
                $willer_gallery_5_page = new WP_Query($willer_args);
                if( $willer_gallery_5_page->have_posts() ) :
                  while ( $willer_gallery_5_page->have_posts() ) : $willer_gallery_5_page->the_post(); ?>
                  <?php $willer_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_gallery');?>
                  <div class="grid-1 img-gallery-smol" data-aos="fade-up" data-aos-duration="1500">
                    <div class="caption">
                      <img src="<?php if ( $willer_image_attributes[0] ) :
                        echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
                        <div class="mask">
                          <a class="info" href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                        </div>
                      </div>
                    </div>
                    <?php endwhile;
                endif;
                wp_reset_postdata(); // End postdata Gallery 5 ?>
              </div>
              <!-- Gallery 6 -->
              <div class=" col-md-6 col-sm-12 willer-padding-gallery">
                <?php
                $willer_gallery_6_cat = esc_attr( get_theme_mod('willer_category_gallery_6'));
                $willer_args = array(
                  'cat' => $willer_gallery_6_cat ,
                  'posts_per_page'=> 1, );
                  $willer_gallery_6_page = new WP_Query($willer_args);
                  if( $willer_gallery_6_page->have_posts() ) :
                    while ( $willer_gallery_6_page->have_posts() ) : $willer_gallery_6_page->the_post(); ?>
                    <?php $willer_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_big');?>
                    <div class="grid-1" data-aos="fade-up" data-aos-duration="2000">
                      <div class="caption-large">
                        <img src="<?php if ( $willer_image_attributes[0] ) :
                          echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
                          <div class="mask">
                            <a class="info" href="<?php the_permalink();?>"><?php the_title_attribute(); ?></a>
                          </div>
                        </div>
                      </div>
                      <?php endwhile;
                  endif;
                  wp_reset_postdata(); // End postdata Gallery 6 ?>
                </div>
              </div>
            </div>
</section>
