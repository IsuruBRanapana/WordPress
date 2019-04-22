<?php
/**
* single.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

if(is_single()) { get_header('post'); } else { get_header(); } ?>
<div class="container">
  <div class="row">
    <div id="primary" class="willer-post-content-area pl-3 pr-3 col-xl-8 col-md-8 col-sm-12 col-xs-12">
      <main id="main" class="site-main">
        
        <?php
        while ( have_posts() ) :
          the_post();
          get_template_part( 'template-parts/content', get_post_type() );
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        endwhile; ?>
      </main><!-- End #main -->
    </div><!-- End #primary -->
    <div class="col-xl-4 col-md-4 col-sm-12 col-xs-12 pr-3 pl-3 ">
      <?php get_sidebar();?>
    </div>
  </div>
  </div>
</div>
<!-- Load More Post -->
<div class="container willer-load-more-posts">
<p><?php posts_nav_link(); ?></p>
</div>
<!-- General divide footer -->
<section class="willer-general-divide-footer">
  <div class="willer-bar-general-divide-footer" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="ease-out-cubic"></div>
</section>
<?php get_footer();
