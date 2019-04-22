<?php
/**
 * section-contact.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!-- Contact -->

<section class="willer-contact container-fluid">
  <div class="content-contact">
    <?php
    $willer_contact_page = esc_attr( get_theme_mod('willer_page_contact'));
    $willer_args = array(
      'page_id' => $willer_contact_page ,
      'posts_per_page'=> 1, );
      $willer_contact = new WP_Query($willer_args);
      if( $willer_contact->have_posts() ) :
        while ( $willer_contact->have_posts() ) : $willer_contact->the_post(); ?>
        <div class="title-contact">
          <h3><?php the_title_attribute(); ?></h3>
        </div>
        <div class="button-contact">
          <button data-animation="animated fadeInRight" class="btn btn-1 btn-border-willer btn-1c">
            <a href="<?php the_permalink();?>"><?php esc_html_e( 'Send Message', 'willer' ); ?></a>
          </button>
          </div>
        <?php endwhile;
      endif;
      wp_reset_postdata(); // End postdata Contact ?>
    </div>
  </section>
