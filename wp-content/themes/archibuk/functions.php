<?php


add_action('after_setup_theme', function() {
	// Register wp_nav_menu() menus
	register_nav_menus(array(
		'header-menu' => esc_html__('Header Menu', 'archibuk'),
	));
}, 10 );


add_action('after_setup_theme', function() {
	// Add Custom Text Domain
	load_child_theme_textdomain('archibuk', get_stylesheet_directory() . '/languages');
}, 99 );


add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('cloudpress-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_script( 'cloudpress-scripts-js', get_stylesheet_directory_uri() . '/js/script.js', array('jquery', 'cloudpress-wow-js'), '1.1.0.2', true );
}, 0);


add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('archibuk-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
}, 100);

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/custom.css');
}, 100);


/**
 * Fires before scripts in the $handles queue are printed.
 */
add_action('wp_print_scripts', function() {
	wp_dequeue_script('cloudpress-smartmenus-bootstrap-js');
	wp_dequeue_script('cloudpress-smartmenus-js');
}, 100);


/**
 * Filters the parts of the document title.
 */
add_action('document_title_parts', function($title) {
	if (!empty($title['tagline'])) {
		$title['tagline'] = str_replace('|', ' ', $title['tagline']);
	}
	return $title;
});


/**
 * Output Language Switcher.
 */
function archibuk_language_switcher($ul_id, $ul_classes) {

	if (!function_exists('pll_the_languages')) {
		return;
	}

	$translations = pll_the_languages( array( 'raw' => 1 ) );
	$out = '';

	if (is_array($translations)) {

		foreach ($translations as $lan_item) {

			$classes = implode(' ', $lan_item['classes']);
			$text = mb_substr($lan_item['name'], 0, 3);
			$slug = $lan_item['slug'] == 'uk' ? 'ua' : $lan_item['slug'];

			$out .= "<li class=\"menu-item $classes\">";
			$out .= "<a href=\"{$lan_item['url']}\" hreflang=\"{$lan_item['locale']}\" lang=\"{$lan_item['locale']}\">$slug</a>";
			$out .= '</li>';
		}
	}

	if ($out) {
		$out = "<ul id=\"$ul_id\" class=\"$ul_classes\">$out</ul>";
	}

	return $out;
}


/**
 * Cyr2lat plugin
 */
add_action('ctl_table', function($ctl_table) {
	$locale = '';
	if(function_exists('pll_current_language')) {
		$locale = pll_current_language();
	} else {
		$locale = get_locale();
	}
  
	switch ( $locale ) {
		case 'ru':
		case 'ru_ru':
		case 'ru_RU':
			$ctl_table['И'] = 'I';
			$ctl_table['и'] = 'i';
			break;
		case 'uk':
		case 'uk_ua':
		case 'uk_UA':
			$ctl_table['И'] = 'Y';
			$ctl_table['и'] = 'y';
			$ctl_table['щ'] = 'sch';
			$ctl_table['Щ'] = 'Sch';
			break;
	}
   
	return $ctl_table;
}, 10 );


/**
 * Filters the returned comment date.
 */
function archibuk_get_comment_date($date, $d, $comment) {
	return mysql2date(get_option('date_format') . ' о ' . get_option('time_format'), $comment->comment_date);
}

add_filter('get_comment_date', 'archibuk_get_comment_date', 10, 3);


/**
 * Comment Form Defaults
 */
function archibuk_comment_form_defaults( $defaults ) {
	$defaults['comment_field'] = '<div class="col-sm-12 form-group comment-form-comment">
            <label for="comment">' . __( 'Comment', 'archibuk' ) . '</label> <span class="required">*</span>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
	$defaults['class_submit'] = 'btn btn-theme pull-right'; // since WP 4.1
	return $defaults;
}

add_filter( 'comment_form_defaults', 'archibuk_comment_form_defaults', 11 );


/**
 * Comment Form Default Fields
 */
function archibuk_comment_form_default_fields( $fields ) {

	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	
	$comment_author = explode(' ', $commenter['comment_author']);
	
	if (count($comment_author) == 2) {
		$name = $comment_author[1];
		$surname = $comment_author[0];
	} else {
		$name = $commenter['comment_author'];
		$surname = '';
	}
	
	$fields   =  array(
		'surname' => '<div class="col-sm-12 form-group comment-form-author">' . '<label for="surname">' . __( 'Surname', 'archibuk' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="surname" name="surname" type="text" value="' . esc_attr( $surname ) . '" size="30"' . $aria_req . ' /></div>',
		'author' => '<div class="col-sm-12 form-group comment-form-author">' . '<label for="author">' . __( 'Name') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $name ) . '" size="30"' . $aria_req . ' /></div>',
		'email'  => '<div class="col-sm-12 form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
	);

	return $fields;
}

add_filter( 'comment_form_default_fields', 'archibuk_comment_form_default_fields', 11 );


/**
 * Fires before a comment is posted.
 */
function archibuk_pre_comment_on_post( $comment_post_ID ) {

	// For anonimous user.
	if (isset($_POST['surname'])) {
		// Validate Surname field.
		if ( get_option( 'require_name_email' ) && empty($_POST['surname']) ) {
			wp_die( __( '<p><strong>ERROR</strong>: please fill the Surname field.</p>', 'archibuk' ), __( 'Comment Submission Failure' ), array( 'response' => 200, 'back_link' => true ) );
		}
	}
}

add_action( 'pre_comment_on_post', 'archibuk_pre_comment_on_post');

		
/**
 * Merge Name and Surname for submitted comment.
 */
if (isset($_POST['comment_post_ID']) && !empty($_POST['author']) && !empty($_POST['surname'])) {
	$_POST['author'] = $_POST['surname'] . ' ' . $_POST['author'];
}


function custom_post_architector_type() { // TODO Custom post type
  $labels = array(
    'name'               => _x( 'Архітектор', 'post type general name' ),
    'singular_name'      => _x( 'Архітектора', 'post type singular name' ),
    'add_new'            => _x( 'Додати', 'архітектора' ),
    'add_new_item'       => __( 'Додати архітектора' ),
    'edit_item'          => __( 'Редарувати сторінку архітектора' ),
    'new_item'           => __( 'Add Архітектор' ),
    'all_items'          => __( 'Всі Архітектори' ),
    'view_item'          => __( 'Переглянути сторінку архітектора' ),
    'search_items'       => __( 'Шукати архітекторів' ),
    'not_found'          => __( 'Нікого не знайдено' ),
    'not_found_in_trash' => __( 'No found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Архітектори'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our architectors information',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title' ),
    'has_archive'   => true,
  );
  register_post_type( 'architectorr', $args ); 
}
add_action( 'init', 'custom_post_architector_type' );	

function custom_taxonomies_membership() { // TODO Custom Taxonomies type
  $labels = array(
    'name'              => _x( 'Членство', 'taxonomy general name' ),
    'singular_name'     => _x( 'Членство', 'taxonomy singular name' )
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'membership', 'architectorr', $args );
}
add_action( 'init', 'custom_taxonomies_membership', 0 );