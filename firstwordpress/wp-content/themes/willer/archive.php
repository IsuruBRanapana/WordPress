<?php
/**
 * archive.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

 get_header();?>

<div id="primary" class="content-area willer-section-category">
	<main id="main" class="site-main">
		<?php if (have_posts() ) : ?>
			<header class="willer-page-header-category container">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<div class="willer-divide-title-category"></div>
			</header><!-- .page-header -->
			<div class="container">
				<div class="row">
					<?php
					/* Start the Loop */
					while (have_posts() ) :
						the_post(); ?>
						<div class="col-xs-12 col-sm-6 willer-image-category">
							<?php get_template_part( 'template-parts/content','category', get_post_type() );?>
						</div>
					<?php endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
			</div>
			<!-- Load More Post -->
			<div class="container willer-load-more-posts">
<p><?php posts_nav_link(); ?></p>
</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
