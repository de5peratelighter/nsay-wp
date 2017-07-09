<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package cloudpress
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function cloudpress_theme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'cloudpress_theme_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function cloudpress_theme_jetpack_setup
add_action( 'after_setup_theme', 'cloudpress_theme_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function cloudpress_theme_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function cloudpress_theme_infinite_scroll_render
