<?php
/**
 * The template part for displaying post
 * @package Veterinary Pet Care
 * @subpackage veterinary_pet_care
 * @since 1.0
 */
?>
<div class="blog-sec animated fadeInDown">
  <div class="row">
    <div class="col-lg-4">
      <?php if(has_post_thumbnail()) { ?>
        <?php the_post_thumbnail(); ?>   
      <?php }?>
    </div>
    <div class="<?php if(has_post_thumbnail()) { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>">
      <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
      <div class="post-info">
        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php echo esc_html( get_the_date()); ?></span>
        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','veterinary-pet-care'), __('0 Comments','veterinary-pet-care'), __('% Comments','veterinary-pet-care') ); ?></span> 
      </div>
      <p><?php the_excerpt(); ?></p>
      <div class="blogbtn">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read Full', 'veterinary-pet-care' ); ?>"><?php esc_html_e('Read Full','veterinary-pet-care'); ?></a>
      </div>
    </div>
  </div>
</div>