<?php
/**
 * section-contact-parallax.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!--Contact parallax-->

<section class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-xs-12 wl-parallax-padding-device"
    <?php
    $willer_parallax_contact_page = esc_attr( get_theme_mod('willer_page_parallax_process'));
    $willer_args = array(
      'page_id'=> $willer_parallax_contact_page ,
      'posts_per_page'=> 1, );
      $willer_parallax_process = new WP_Query($willer_args);
      if( $willer_parallax_process->have_posts() ) :
        while ( $willer_parallax_process->have_posts() ) : $willer_parallax_process->the_post(); ?>
        <?php $willer_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_contact_parallax');?>
        <div class="willer-img-parallax" style="background-image: url('<?php if ( $willer_image_attributes[0] ) :
        echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>'); background-attachment:fixed;background-repeat:no-repeat;height:500px; background-position: center;">
        <div class="willer-text-parallax">
          <h2><?php the_title_attribute(); ?></h2>
          <div class="willer-divide-parallax"></div>
          <button data-animation="animated fadeInRight" class="btn btn-1 btn-border-willer btn-1c btn-parallax">
            <a href="<?php the_permalink();?>"><?php esc_html_e( 'View More', 'willer' ); ?></a>
          </button>
        </div>
      </div>
    <?php endwhile;
  endif;
  wp_reset_postdata(); // End postdata Contact Parallax ?>
</div>
</div>
</section>
