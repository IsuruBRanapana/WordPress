<?php
/**
 * section-static.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

?>

<!--Static-->

<?php
$willer_args = array(
  'cat' => esc_attr(get_theme_mod('willer_category_static_header' )),
  'posts_per_page' =>1,
);
$willer_page_static_header = new WP_Query( $willer_args );
if( $willer_page_static_header->have_posts() ) :
  while( $willer_page_static_header->have_posts() ) : $willer_page_static_header->the_post();?>
<div class="willer-box-header-static">
 <?php the_custom_header_markup() ?>
 <div class="container-fluid pr-5 mr-5 willer-container-static">
   <div class="row">
   <div class="col-md-3"></div>
    <div class="col-md-3"></div>
   <div class="col-md-6 col-xs-12 willer-text-header-static">
    <h1 class="willer-title-static-header"><?php the_title_attribute(); ?></h1><br>
    <div class="willer-divide-title-static-header"></div>
    <div class="willer-p-static-header"><?php the_excerpt();?></div><br>
    <button data-animation="animated fadeInRight" class="btn btn-1 btn-border-willer btn-1c">
      <a href="<?php the_permalink();?>"><?php esc_html_e( 'view more', 'willer' ); ?></a>
    </button>
  </div>
</div>
</div>
</div>
<?php endwhile;
endif;
wp_reset_postdata();?>
