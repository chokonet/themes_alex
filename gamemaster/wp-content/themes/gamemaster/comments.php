<?php
/**
 * @package WordPress
 * @subpackage game_master
 * @since game master 1.0
 */
?>
  <div id="comments">


  <?php // You can start editing here -- including this comment! ?>

  <?php if ( have_comments() ) : ?>
    

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-above">

      <h1 class="assistive-text"><?php _e( 'Comment navigation', 'gamemaster' ); ?></h1>
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'gamemaster' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'gamemaster' ) ); ?></div>
    </nav>
    <?php endif; // check for comment navigation ?>

    <div class="commentlist">
   
      <?php
               wp_list_comments( array( 'callback' => 'gamemaster_comment' ) );
      ?>
    </div>

   
    <?php
    /* If there are no comments and comments are closed, let's leave a little note, shall we?
     * But we only want the note on posts and pages that had comments in the first place.
     */
    if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="nocomments"><?php _e( 'Comments are closed.' , 'gamemaster' ); ?></p>
    <?php endif; ?>

  <?php endif; // have_comments() ?>

  <?php comment_form(); ?>

</div><!-- #comments -->
