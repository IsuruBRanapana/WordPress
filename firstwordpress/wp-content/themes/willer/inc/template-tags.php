<?php
/**
 * template-tags.php
 *
 * @author    Denis Franchi
 * @package   Willer
 * @version   1.1.2
 */

if ( ! function_exists( 'willer_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function willer_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'willer' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
  endif;
if ( ! function_exists( 'willer_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function willer_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html( '%s','post author', 'willer' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( 'willer_entry_footer' ) ) :
	function willer_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html( ' , ', 'willer' ) );
			if ( $categories_list ) {?>
				<i class="fas fa-archive willer-category-post"></i>
				<?php printf( '<span class="cat-links">' . esc_html( '%1$s', 'willer' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}?>
			<div class="willer-comments-post-footer"><i class="fas fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%');?></a></div>
			<?php
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
			  sprintf(
				wp_kses(
				  /* translators: %s: post title */
				  __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'willer' ),
				  array(
					'span'  => array(
					'class' => array(),
					),
				  )
				),
				get_the_title()
			  )
			);
			echo '</span>';
		  }
		  edit_post_link(
			sprintf(
			  wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'willer' ),
				array(
				  'span'  => array(
					'class' => array(),
				  ),
				)
			  ),
			  get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		  );
	}
endif;
if ( ! function_exists( 'willer_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function willer_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );?>
		</a>
		<?php
		endif; // End is_singular().
	}
endif;
