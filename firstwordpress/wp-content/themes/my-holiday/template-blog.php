<?php
/*
Template Name: Full Width Page
*/
 get_header(); ?>

<div id="content-center ap-full-width">

	<div id="primary" class="content-area">
	
		<main style="width: 100%; padding: 0px 40px 20px 40px;" id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

			    <div class="nextpage">
				
					<div class="pagination">
								
						<?php the_post_navigation(); ?>
									
					</div> 
								
				</div>    

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
		
	</div><!-- #primary -->

	
</div>	

<?php get_footer(); ?>