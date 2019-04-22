<?php
/**
* 404.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

get_header('willer');?>

<div id="primary" class="content-area container">
  <main id="main" class="site-main">
    <section class="error-404 not-found">
      <header class="page-header pt-5 mt-5">
        <h1 class="page-title"><?php esc_html_e( '404 Error! Oops! That page can&rsquo;t be found.', 'willer' ); ?></h1>
      </header><!-- .page-header -->
      <div class="page-content pt-5 mt-5">
        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'willer' ); ?></p>
        <?php	get_search_form();?>
      </div><!-- .page-content -->
    </section><!-- .error-404 -->
  </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
