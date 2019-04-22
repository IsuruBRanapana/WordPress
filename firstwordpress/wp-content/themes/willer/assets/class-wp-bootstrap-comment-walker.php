<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in WordPress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */

class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @access protected
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int    $depth   Depth of comment.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parento medial' : 'medial' ); ?>>
			<?php if ( 0 != $args['avatar_size'] ): ?>
<div class="container-fluid">
	<div class="row">
			<div class="willer-media-left col-md-3">
				<a href="<?php echo esc_attr(get_comment_author_url()); ?>" class="media-object">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</a>
	            <?php printf( '<h4 class="media-heading">%s</h4>', get_comment_author_link() ); ?>
	         <div class="comment-metadata">
				<?php the_time('d.m.Y') ?>
			 </div><!-- .comment-metadata -->
			</div>
			 <?php endif; ?>
			 <div class="media-body col-md-8" id="div-comment-<?php comment_ID(); ?>">
			   <div class="comment-content">
					<?php comment_text(); ?>
			   </div><!-- .comment-content -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
				  <p class="comment-awaiting-moderation label label-info"><?php esc_html_e( 'Your comment is awaiting moderation.' ,'willer'); ?></p>
				<?php endif; ?>
			 </div>
			 <div class="willer-reply-comments col-md-1">
			   <ul class="list-inline">
				<?php edit_comment_link( __( 'Edit','willer' ), '<li class="edit-link">', '</li>' ); ?>
					<?php
						comment_reply_link( array_merge(
							$args, array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<li class="reply-link">',
								'after'     => '</li>'
							)
						) );	?>
				</ul>
	         </div>
    </div><!-- end container-fluid -->
</div><!--end row-->
<?php
	}
}
