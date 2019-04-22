<?php
/**
* content-none.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

?>
<section class="no-results not-found">
  <div class="container">
    <header class="wille-page-header">
      <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'willer' ); ?></h1>
      <div class="willer-divide-content-none"></div>
    </header><!-- .willer-page-header -->
    <div class="page-content">
      <?php
      if ( is_home() && current_user_can( 'publish_posts' ) ) :
        printf(
          '<p>' . wp_kses(
            /* translators: 1: link to WP admin new post page. */
            __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'willer' ),
            array(
              'a' => array(
                'href' => array(),
              ),
            )
            ) . '</p>',
            esc_url( admin_url( 'post-new.php' ) )
          );

          elseif ( is_search() ) :
            ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'willer' ); ?></p>
            <?php
            get_search_form();
            else :
              ?>
              <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'willer' ); ?></p>
              <?php
              get_search_form();
            endif;
            ?>
          </div><!-- End page-content -->
        </div><!-- End container -->
      </section><!-- End no-results -->
