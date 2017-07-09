<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 *
 * @package cloudpress
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses cloudpress_theme_header_style()
 * @uses cloudpress_theme_admin_header_style()
 */
function cloudpress_theme_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cloudpress_theme_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '',
		'width'                  => 1920,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'cloudpress_theme_header_style',
		'admin-head-callback'    => 'cloudpress_theme_admin_header_style',
		'admin-preview-callback' => 'cloudpress_theme_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'cloudpress_theme_custom_header_setup' );

if ( ! function_exists( 'cloudpress_theme_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see cloudpress_theme_custom_header_setup().
 */
function cloudpress_theme_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.logo h1 a, .logo-nav .logo p , .logo-nav .logo h1, .logo-nav .dropdown-menu > li > a, .logo-nav .theme-nav .navbar-nav > li > a , .logo-nav .top-search .navbar-search-theme{
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // cloudpress_theme_header_style

