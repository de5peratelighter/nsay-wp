<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package cloudpress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cloudpress_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'cloudpress_theme_body_classes' );



add_filter( 'comment_form_default_fields', 'cloudpress_theme_comment_form_fields' );
function cloudpress_theme_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

	$fields   =  array(
		'author' => '<div class="col-sm-12 form-group comment-form-author">' . '<label for="author">' . esc_attr( 'Name', 'cloudpress' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="'.__('Your Name','cloudpress').'"/></div>',
		'email'  => '<div class="col-sm-12 form-group comment-form-email"><label for="email">' . esc_attr( 'Email', 'cloudpress' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="'.__('Email','cloudpress').'"/></div>',
		'url'    => '<div class=" col-sm-12 form-group comment-form-url"><label for="url">' . esc_attr( 'Website', 'cloudpress' ) . '</label> ' .
			'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.__('Your URL','cloudpress').'"/></div>'
	);

	return $fields;
}

add_filter( 'comment_form_defaults', 'cloudpress_theme_comment_form' );
function cloudpress_theme_comment_form( $args ) {
	$args['comment_field'] = '<div class="col-sm-12 form-group comment-form-comment">
            <label for="comment">' . esc_attr( 'Comment', 'cloudpress' ) . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'.esc_attr('Leave your comment here..','cloudpress').'"></textarea>
        </div>';
	$args['class_submit'] = 'btn btn-theme pull-right'; // since WP 4.1

	return $args;
}


