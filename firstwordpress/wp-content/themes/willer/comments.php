<?php
/**
* comments.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

if ( post_password_required() ) {
  return;
}
?>
<div id="comments" class="willer-comments-area">
  <h2 class="comments-title">
    <?php
    if ( have_comments() ) {
      printf(
        esc_html__( 'Comments', 'willer' )
      ); } ?>
    </h2><!-- End comments-title -->
    <div class="willer-divide-title-comments"></div>
    <ul class="willer-list-comments">
      <?php
      wp_list_comments( array(
        'style'         => 'ul',
        'short_ping'    => true,
        'avatar_size'   => '100',
        'reply_text'    => '<i class="fas fa-reply"></i>',
        'walker'        => new Bootstrap_Comment_Walker(),
      ) );?>
    </ul><!-- End comment-list -->
    <?php
    the_comments_navigation();
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() ) :?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'willer' ); ?></p>
  <?php endif;?>
  <div class="willer-form-reply">
    <?php
    comment_form(array(
      'title_reply'=>__('Post a Comment','willer'),
      'comment_notes_before'=>'',
      'label_submit'      => __( 'Submit','willer' ),
    ));?>
  </div>
</div><!-- End #comments -->
