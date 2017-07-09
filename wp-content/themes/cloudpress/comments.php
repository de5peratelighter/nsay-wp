<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package cloudpress
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>


	<div id="comments" class="comments-area">
		<?php // You can start editing here -- including this comment! ?>


		<?php if ( have_comments() ) : ?>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cloudpress' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cloudpress' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cloudpress' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>

			<div class="col-sm-12 comments">
				<h2><?php
					printf( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'cloudpress' ),
						number_format_i18n( get_comments_number() )
					);
					?>
				</h2>
				<?php
					wp_list_comments( array(
						'style' => 'div',
						'callback' => null,
						'end-callback' => null,
						'type' => 'all',
						'page' => null,
						'short_ping' => true,
						'walker' => new cloudpress_Walker_Comment,
					) );
				?>
			</div><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cloudpress' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cloudpress' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cloudpress' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php endif; // Check for comment navigation. ?>

		<?php endif; // Check for have_comments(). ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cloudpress' ); ?></p>
		<?php endif; ?>

		<?php comment_form(array('title_reply'=>''.__('Leave a comment:','cloudpress').'')); ?>




	</div><!-- #comments -->