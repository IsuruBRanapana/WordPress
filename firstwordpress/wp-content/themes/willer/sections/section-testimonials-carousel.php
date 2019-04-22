<?php
/**
 * section-testimonials-carousel.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!-- Testimonials carousel -->

<section id="willer-text-carousel" class="carousel slide carousel-willer text-center" data-ride="carousel">
  <div class="willer-img-carousel-testimonials">
  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/willer_quotes.svg"/>
</div>
  <div class="row">
    <div class="col-xs-offset-3 col-xs-6 willer-carousel-testimonials">
      <div class="carousel-inner">
        <?php
        $willer_testimonials_cat = esc_attr( get_theme_mod('willer_category_testimonials'));
        $willer_testimonials_count= 0;
        $willer_args = array(
          'cat' => $willer_testimonials_cat ,
          'showposts' => $willer_testimonials_count );
          $willer_testimonials_carousel = new WP_Query($willer_args);
          if( $willer_testimonials_carousel->have_posts() ) :
            while ( $willer_testimonials_carousel->have_posts() ) : $willer_testimonials_carousel->the_post(); ?>
            <div class="carousel-item <?php if($willer_testimonials_count == 0){ echo 'active'; } ?>">
              <?php $willer_testimonials_count ++; ?>
              <div class="carousel-content">
                <div>
                  <p><?php echo esc_attr(wp_trim_words( get_the_content(), 15, '' ));?></p><br>
                  <a href="<?php the_permalink();?>"><?php the_title_attribute(); ?></h2></a>
                </div>
              </div>
            </div>
          <?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata Testimonials carousel ?>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#willer-text-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_html_e( 'Previous', 'willer' ); ?></span>
  </a>
  <a class="carousel-control-next" href="#willer-text-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_html_e( 'Next', 'willer' ); ?></span>
  </a>
</section>
