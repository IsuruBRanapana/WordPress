<?php
/**
 * section-portfolio.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!--Portfolio-->

<section class="willer-portfolio"> 
  <div class="container-fluid">
    <div class="row effect-img-willer-portfolio">
      <?php
      $willer_portfolio_cat = esc_attr( get_theme_mod('willer_category_portfolio'));
      $willer_args = array(
        'cat' => $willer_portfolio_cat ,
        'posts_per_page'=> 1, );
        $willer_portfolio = new WP_Query($willer_args);
        if( $willer_portfolio->have_posts() ) :
          while ( $willer_portfolio->have_posts() ) : $willer_portfolio->the_post(); ?>
          <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_big');?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 div-willer-portfolio" data-aos="fade-up" data-aos-duration="2400">
              <img src="<?php if ( $willer_image_attributes[0] ) :
                echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>" class="img-fluid"/>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-xs-2"></div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 tiltle-willer-portfolio text-right">
                <div class="willer-text-willer-portfolio">
                  <h2><?php
              foreach((get_the_category()) as $category) {
                echo esc_attr($category->cat_name) . ' ';
              } ?></h2>
                  <div class="divide-willer-portfolio"></div>
                  <div class="wl-portfolio-padfding-title"></div>
                  <?php the_excerpt();?><br>
                  <button data-animation="animated fadeInRight" class="btn btn-1 btn-border-willer btn-1c btn-parallax">
                    <a href="<?php the_permalink();?>"><?php esc_html_e( 'Learn More', 'willer' ); ?></a>
                  </button>
                </div>
              </div>
            <?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata Portfolio ?>
      </div>
    </div>
  </section>
