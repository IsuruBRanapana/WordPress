<?php
/**
* content-page.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

?>

<section class="container willer-content-default-page">
<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
	<?php willer_post_thumbnail(); ?>
	<div class="container">
		<div class="row">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- End entry-header -->
			<div class="entry-content">
				<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'willer' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- End entry-content -->
		</div>
	</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'willer' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- End entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
</section>
<!-- General divide footer -->
<section class="willer-general-divide-footer">
	<div class="willer-bar-general-divide-footer" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="ease-out-cubic"></div>
</section>
