<?php
/**
 * section-menuAbout.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

 $willer_about_menu_right_category = esc_attr( get_theme_mod( 'willer_page_id_about_menu_right'));
 $willer_args = array(
   'page_id' => $willer_about_menu_right_category ,
   'posts_per_page'=> 1, );
   $willer_about_menu_right= new WP_Query($willer_args);
   if( $willer_about_menu_right->have_posts() ) :
     while ( $willer_about_menu_right->have_posts() ) : $willer_about_menu_right->the_post(); { ?>
       <?php $willer_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'willer_gallery');?>
       <section class="willer-about-menu-right">
         <h4><?php the_title_attribute();?></h4>
         <div class="willer-img-menu-right">
         <img class="img-fluid" src="<?php if ( $willer_image_attributes[0] ) :
           echo esc_url($willer_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg'; endif; ?>"/>
         </div>
           <?php the_excerpt();?>
           <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h5><?php esc_html_e( 'Learn More', 'willer' ); ?></h5></a>
         </section>
       <?php }
     endwhile;
   endif;
   wp_reset_postdata(); // End postdata Menu Right ?>
   
