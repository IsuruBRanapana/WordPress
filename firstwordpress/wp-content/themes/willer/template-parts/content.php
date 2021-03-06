<?php
/**
* content.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="willer-blog-sidebar-right">
    <?php the_post_thumbnail('willer_big'); ?>
    <header class="entry-header">
      <?php
      if ( is_singular() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
        else :
         the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink()) . '" rel="bookmark">', '</a></h2>' );
        endif;
        if ( 'post' === get_post_type() ) :?>
        <div class="willer-divide-title-post"></div>
        <div class="entry-meta">
          <i class="far fa-calendar-alt"></i><?php
          willer_posted_on();
          the_tags('<i class="fas fa-tag willer-tags-post"></i>','<p class="willer-separate-tags-post"></p>');?>
          <i class="fas fa-user willer-user-post"></i>
          <?php willer_posted_by();?>
        </div><!-- End entry-meta -->
      <?php endif; ?>
    </header><!-- End entry-header -->
    <div class="entry-content">
      <?php
      the_content( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'willer' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
        ) );
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'willer' ),
          'after'  => '</div>',
        ) );?>
      </div><!-- End entry-content -->
      <footer class="willer-entry-footer">
        <?php willer_entry_footer(); ?>
      </footer><!-- End entry-footer -->
    </div>
  </article>
  <!-- #post-<?php the_ID(); ?> -->
