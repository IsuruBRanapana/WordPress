<?php
/**
 * section-blog.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!-- Blog -->

<section class="willer-blog">
  <div class="container-fluid">
    <div class="row pt-md-5">
      <!-- Blog 1 -->
      <div class="col-lg-3">
        <?php
        $willer_blog_1_cat = esc_attr( get_theme_mod('willer_category_blog_1'));
        $willer_args = array(
          'cat' => $willer_blog_1_cat ,
          'posts_per_page'=> 2, );
          $willer_blog_1 = new WP_Query($willer_args);
          if( $willer_blog_1->have_posts() ) :
            while ( $willer_blog_1->have_posts() ) : $willer_blog_1->the_post(); ?>
            <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_single');?>
            <div class="willer-card card-one" data-aos="fade-up" data-aos-duration="2000">
              <img src="<?php if ( $willer_image_attributes[0] ) :
                echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>"  class="img-fluid img-card-four"/>
                <div class="card-body">
                  <div class="text-willer-blog-slider">
                    <a href="<?php the_permalink();?>"><h4><?php the_title_attribute(); ?></h4></a>
                  </div>
                  <div class="divide-willer-blog-four"></div><br>
                  <p class="card-text">
                    <small class="text-time">
                      <i class="far fa-clock"></i><em><?php the_time(); ?></em>
                    </small>
                  </p>
                </div>
              </div>
            <?php endwhile;
          endif;
          wp_reset_postdata() // End postdata Blog 1 ?>
        </div>
        <!-- Blog 2 -->
        <div class="col-lg-3 mt-lg-0 mt-5">
          <?php
          $willer_blog_2_cat = esc_attr( get_theme_mod('willer_category_blog_2'));
          $willer_args = array(
            'cat' => $willer_blog_2_cat ,
            'posts_per_page'=> 2, );
            $willer_blog_2 = new WP_Query($willer_args);
            if( $willer_blog_2->have_posts() ) :
              while ( $willer_blog_2->have_posts() ) : $willer_blog_2->the_post(); ?>
              <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_single');?>
              <div class="willer-card card-one" data-aos="fade-up" data-aos-duration="2500">
                <img src="<?php if ( $willer_image_attributes[0] ) :
                  echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid img-card-four"/>
                  <div class="card-body">
                    <div class="text-willer-blog-slider">
                      <a href="<?php the_permalink();?>"><h4><?php the_title_attribute(); ?></h4></a>
                    </div>
                    <div class="divide-willer-blog-four"></div><br>
                    <p class="card-text">
                      <small class="text-time">
                        <i class="far fa-clock"></i><em><?php the_time(); ?></em>
                      </small>
                    </p>
                  </div>
                </div>
              <?php endwhile;
            endif;
            wp_reset_postdata(); // End postdata Blog 2 ?>
          </div>
          <!-- Blog Carousel -->
          <div class="col-lg-6 top-slider mt-lg-0 mt-5">
            <h2 class="title-willer-blog"><?php echo esc_attr( get_theme_mod('willer_title_blog_slider'));?></h2>
            <div class="divide-general-willer-blog"></div>
            <h3 class="subtitle-willer-blog"><?php echo esc_attr( get_theme_mod('willer_subtitle_blog_slider'));?></h3>
            <!-- carousel -->
            <div id="willerCarousel" class="carousel slide willer-blog-slider" data-ride="carousel">
              <div class="carousel-inner">
                <?php
                $willer_blog_slider_cat = esc_attr( get_theme_mod('willer_category_blog_slider'));
                $willer_blog_slider_count = 0;
                $willer_args = array(
                  'cat' => $willer_blog_slider_cat ,
                  'showposts' => $willer_blog_slider_count );
                  $willer_blog_carousel = new WP_Query($willer_args);
                  if( $willer_blog_carousel->have_posts() ) :
                    while ( $willer_blog_carousel->have_posts() ) : $willer_blog_carousel->the_post(); ?>
                    <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_big');?>
                    <div class="carousel-item <?php if($willer_blog_slider_count == 0){ echo 'active'; } ?>">
                      <?php $willer_blog_slider_count ++; ?>
                      <img src="<?php if ( $willer_image_attributes[0] ) :
                        echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>"  class="img-fluid">
                        <div class="text-willer-blog-slider">
                          <a href="<?php the_permalink();?>"><h2><?php the_title_attribute(); ?></h2></a>
                          <?php the_excerpt();?><br>
                          <i class="far fa-clock"></i><p class="our-willer-blog"><?php the_time(); ?></p>
                        </div>
                      </div>
                    <?php endwhile;
                  endif;
                  wp_reset_postdata(); // End postdata Blog Carousel ?>
                </div>
              </div>
            </div>
          </div>
        </section>
