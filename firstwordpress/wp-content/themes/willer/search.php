<?php
/**
* search.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

get_header(); ?>

<section id="primary" class="content-area container willer-section-content-search">
  <main id="main" class="site-main">
    <?php if ( have_posts() ) : ?>
      <header class="page-header-search">
        <h1 class="page-title-search">
          <?php
          /* translators: %s: search query. */
          printf( esc_html__( 'Search Results for: %s', 'willer' ), '<span>' . get_search_query() . '</span>' );?>
        </h1>
        <div class="willer-divide-title-content-search"></div>
      </header><!-- End .page-header -->
      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', 'search' );
      endwhile;?>
      <!-- Load More Post -->
      <div class="container willer-load-more-posts">
<p><?php posts_nav_link(); ?></p>
</div>
  <?php
  else :
    get_template_part( 'template-parts/content', 'none' );
  endif; ?>
</main><!-- End #main -->
</section><!-- End #primary -->

<?php get_footer();
