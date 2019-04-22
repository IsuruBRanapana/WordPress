<?php
/**
 * The template part for displaying grid layout
 * @package Veterinary Pet Care
 * @subpackage veterinary_pet_care
 * @since 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <div class="blog-sec">
        <?php if(has_post_thumbnail()) { ?>
          <?php the_post_thumbnail(); ?> 
        <?php }?>
        <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
        <p><?php the_excerpt(); ?></p>
        <div class="blogbtn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read Full', 'veterinary-pet-care' ); ?>"><?php esc_html_e('Read Full','veterinary-pet-care'); ?></a>
        </div>
    </div>
</div>