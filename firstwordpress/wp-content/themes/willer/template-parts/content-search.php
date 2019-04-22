<?php
/**
* content-search.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

?>

<section class="willer-content-search container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
      <?php if ( 'post' === get_post_type() ) : ?>
      <div class="entry-meta">
          <?php
          willer_posted_on();
          willer_posted_by();
          ?>
        </div><!-- End entry-meta -->
      <?php endif; ?>
    </header><!-- End entry-header -->
    <?php willer_post_thumbnail(); ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- End entry-summary -->
    <footer class="entry-footer willer-footer-content-search">
      <?php willer_entry_footer(); ?>
    </footer><!-- End entry-footer -->
  </article><!-- #post-<?php the_ID(); ?> -->
</div>
