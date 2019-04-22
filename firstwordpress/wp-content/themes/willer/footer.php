<?php
/**
* footer.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/
?>

</div>  <!-- End #content -->
<footer class="willer-footer-effect-parallax">
  <div class="container-fluid">
  <div class="row">
      <!-- About Footer -->
      <div class="<?php echo esc_attr( get_theme_mod('willer_footer_column','col-md-3'));?> col-sm-12 col-xs-12 willer-about-footer">
        <?php dynamic_sidebar( 'footer-1' ); ?>
         <?php if ( false == esc_attr( get_theme_mod( 'wl_enable_social_footer', true) )) : // Function Customize Enable Social Footer ?>
        <div class="willer-social-container">
          <ul class="willer-social-icons-footer">
              <?php get_template_part( 'sections/section','social');?> 
          </ul>
        </div>
      <?php endif; // End Function Customize Enable Social Footer ?>
      </div>
      <!--Most Article Footer -->
      <div class="<?php echo esc_attr( get_theme_mod('willer_footer_column','col-md-3'));?> col-sm-12 col-xs-12 willer-most-read-article-footer">
        <?php dynamic_sidebar( 'footer-2' ); ?>
      </div>
      <!--Contact Footer -->
      <div class="<?php echo esc_attr( get_theme_mod('willer_footer_column','col-md-3'));?> col-sm-12 col-xs-12 willer-contact-footer">
        <?php dynamic_sidebar( 'footer-3' ); ?>
      </div>
      <!-- Map Footer -->
      <div class="<?php echo esc_attr( get_theme_mod('willer_footer_column','col-md-3'));?> col-sm-12 col-xs-12 willer-map-footer">
        <?php dynamic_sidebar( 'footer-4' ); ?>
      </div>
    </div>
  </div>
  <!--Copyright-->
  <div class="willer-copyright">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="willer-link-copyright">
          <?php
            echo '<a href="' . esc_url( 'https://www.denisfranchi.com/' ) .'" rel="author" target="_blank">' . esc_html__( 'By: Franchi Design', 'willer' ) . '</a>' 
            ?>            
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 ">
          <?php if ( false == esc_attr( get_theme_mod( 'wl_enable_custom_logo_footer', false) )) : // Function Customize Enable Custom Logo Footer ?>
          <div class="willer-logo-footer">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php the_custom_logo();?></a>
          </div>
        <?php endif; // End Function Customize Enable Custom Logo Footer ?>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <?php if ( false == esc_attr( get_theme_mod( 'wl_enable_copyright_footer', false) )) : // Function Customize Copyright  Footer ?>
          <div class="willer-text-copyright">
            <p><?php esc_html_e( 'Copyright', 'willer' ); ?>&copy;<?php echo esc_attr(date("Y")); echo " "; echo bloginfo('name'); ?></p>
          </div>
        <?php endif; // End Function Customize Enable Copyright Footer ?>
        </div>
      </div>
    </div>
  </div>
</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
