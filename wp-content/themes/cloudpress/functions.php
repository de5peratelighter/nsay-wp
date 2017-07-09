<?php
/**
 * cloudpress functions and definitions
 *
 * @package cloudpress
 */

if ( ! function_exists( 'cloudpress_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cloudpress_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cloudpress, use a find and replace
	 * to change 'cloudpress' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cloudpress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */

	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since WordPress 4.5
	 */

	add_theme_support( 'custom-logo', array(
		'height'      => 44,
		'width'       => 262,
		'flex-height' => true,
		'flex-width'  => true,
		'default'	  =>get_template_directory_uri().'/images/logo.png',
	) );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 571, 373, true );
	add_image_size( 'cloudpress-blog-thumb', 571, 373, true); // Archive Pages
	add_image_size( 'cloudpress-slider-thumb', 350, 182, true); // slider 
	add_image_size( 'cloudpress-feature-thumb', 350, 240, true); // feature 

	/* woocommerce support */
	add_theme_support( 'woocommerce' );
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'cloudpress' ),
		'secondary' => esc_html__( 'Footer Menu', 'cloudpress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cloudpress_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( "custom-header", 
		array(
		'default-color' => 'ffffff',
		'default-image' => '',
			)  
		);
	add_editor_style() ;
}
endif; // cloudpress_theme_setup
add_action( 'after_setup_theme', 'cloudpress_theme_setup' );




/**
 * Enqueue scripts and styles.
 */
function cloudpress_theme_scripts() {
	wp_enqueue_style( 'cloudpress-style', get_stylesheet_uri() );
	wp_enqueue_style( 'cloudpress-bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'cloudpress-fontawesome-css', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style( 'cloudpress-animate-css', get_template_directory_uri().'/css/animate.css' );	
	wp_enqueue_style( 'cloudpress-responsive-css', get_template_directory_uri().'/css/responsive.css' );
	wp_enqueue_style( 'cloudpress-styles-css', get_template_directory_uri().'/css/styles.css' );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'cloudpress-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'cloudpress-wow-js', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'cloudpress-smartmenus-bootstrap-js', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'cloudpress-smartmenus-js', get_template_directory_uri() . '/js/jquery.smartmenus.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'cloudpress-scripts-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true );

	if(is_rtl()) {
		wp_enqueue_style( 'cloudpress-rtl', get_template_directory_uri().'rtl.css' );
		wp_enqueue_style( 'bootstrap-bootstrap-rtl', get_template_directory_uri().'/css/bootstrap-rtl.css' );
		wp_enqueue_style( 'bootstrap-responsive-rtl', get_template_directory_uri().'/css/responsive-rtl.css' );
	
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cloudpress_theme_scripts' );






/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 900;
function cloudpress_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cloudpress_theme_content_width', 640 );

}
add_action( 'after_setup_theme', 'cloudpress_theme_content_width', 0 );


function cloudpress_theme_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'front_page_template', 'cloudpress_theme_filter_front_page_template' );





/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cloudpress_theme_widgets_init() {
	register_sidebar( array(
			'name'          => __('Main Sidebar','cloudpress'),
			'class'			=> 'sidebar',
			'id'            => 'cloudpress-theme-main-sidebar',
			'before_widget' => '<div class="side">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="side-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __('Woocommerce Left Sidebar','cloudpress'),
			'id'            => 'woocommerce_left',
			'before_widget' => '<div class="side">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="side-title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __('Footer Sidebar','cloudpress'),
			'id'            => 'footer_1',
			'before_widget' => '<div class="col-sm-4">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

}
add_action( 'widgets_init', 'cloudpress_theme_widgets_init' );



// ================ cloudpressTHEME GOOGLE FONTS CUSTOMIZE ================== //
function cloudpress_theme_fonts_url() {
	$fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Droid Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $droid = _x( 'on', 'Droid Sans font: on or off', 'cloudpress' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'cloudpress' );
 
    if ( 'off' !== $droid || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $droid ) {
            $font_families[] = 'Droid Sans:300,400,700,400italic';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:700italic,300,400,800,600';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

function cloudpress_theme_scripts_styles() {
    wp_enqueue_style( 'cloudpress-fonts', cloudpress_theme_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'cloudpress_theme_scripts_styles' );


function cloudpress_theme_editor_styles() {
    add_editor_style( array( 'editor-style.css', cloudpress_theme_fonts_url() ) );
}
add_action( 'after_setup_theme', 'cloudpress_theme_editor_styles' );


function cloudpress_theme_custom_header_fonts() {
    wp_enqueue_style( 'cloudpress-fonts', cloudpress_theme_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'cloudpress_theme_scripts_styles' );




// ================ cloudpressTHEME PAGINATION BARS CUSTOMIZE ================== //
if ( ! function_exists( 'cloudpress_theme_pagination_bars' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function cloudpress_theme_pagination_bars() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 1 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<span aria-hidden="true">&laquo;</span>', 'cloudpress' ),
			'next_text' => __( '<span aria-hidden="true">&raquo;</span>', 'cloudpress' ),
	        'type'      => 'list',
		) );

		if ( $links ) :

		?>
		<ul class="pagination paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'cloudpress' ); ?></h1>
				<?php echo $links; ?>
		</ul><!-- .navigation -->
		<?php
		endif;
	}
endif;



// ================ CLOUDPRESS THEME ENTRY META ================== //

if ( ! function_exists( 'cloudpress_theme_entry_meta' ) ) :
	function cloudpress_theme_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() )
			echo '<span class="featured-post">' . __( 'Sticky', 'cloudpress' ) . '</span>';

		if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
			cloudpress_theme_entry_meta();

		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'cloudpress' ) );
		if ( $categories_list ) {
			echo '<span class="categories-links">' . $categories_list . '</span>';
		}

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'cloudpress' ) );
		if ( $tag_list ) {
			echo '<span class="tags-links">' . $tag_list . '</span>';
		}

		// Post author
		if ( 'post' == get_post_type() ) {
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'cloudpress' ), get_the_author() ) ),
				get_the_author()
			);
		}
	}
endif;




// ================ CLOUDPRESS THEME POSTED ON ================== //
if ( ! function_exists( 'cloudpress_theme_posted_on' ) ) :
	function cloudpress_theme_posted_on( $echo = true ) {
		if ( has_post_format( array( 'chat', 'status' ) ) )
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'cloudpress' );
		else
			$format_prefix = '%2$s';

		$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', 'cloudpress' ), the_title_attribute( 'echo=0' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_option( 'date_format' ) ) )
		);

		if ( $echo )
			echo $date;

		return $date;
	}
endif;



// ================ cloudpressTHEME GET LINK URL ================== //

if ( ! function_exists( 'cloudpress_theme_get_link_url' ) ) :
function cloudpress_theme_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;




// ================ CLOUDPRESS THEME EXCERPT MORE ================== //

if ( ! function_exists( 'cloudpress_theme_excerpt_more' ) && ! is_admin() ) :
	function cloudpress_theme_excerpt_more( $more ) {
		
	}
	add_filter( 'excerpt_more', 'cloudpress_theme_excerpt_more' );
endif;


// ================ CLOUDPRESS THEME THEME BREADCRUMB CUSTOMIZE ================== //
if ( ! function_exists( 'cloudpress_theme_breadcrumbs' ) ) :

//add Bootstrap Breadcrumbs to your WordPress
	function cloudpress_theme_breadcrumbs() {

	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = '<span class="divider"></span>'; // delimiter between crumbs
		$home = 'Home'; // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<li class="active"><span class="current">'; // tag before the current crumb
		$after = '</span></li>'; // tag after the current crumb

		global $post;
		$homeLink = esc_url( home_url() );

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';

		} else {

			echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
				echo $before . '' . single_cat_title('', false) . '' . $after;

			} elseif ( is_search() ) {
				echo '<li>'. __('Search results for','cloudpress') . $delimiter .'</li>';
				echo $before . get_search_query() . '"' . $after;

			} elseif ( is_day() ) {
				echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
				echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li> ';
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					echo '<li>'.$cats.'</li>';
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
				echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
				if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . '</li> ';
				}
				if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo '<li > '. __('Posts tagged', 'cloudpress') . $delimiter .'</li>';
				echo  $before . single_tag_title('', false) . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo '<li>' . __('Articles posted by','cloudpress'). $delimiter .'</li>';
				echo $before  . $userdata->display_name . $after;

			} elseif ( is_404() ) {
				echo '<li>' . __('Error 404','cloudpress'). $delimiter .'</li>';
				
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
				
				echo '<li>' . __('Page','cloudpress'). $delimiter .'</li>';
				echo $before  . get_query_var('paged'). $after;
			
			}

			echo '</ul>';

		}
	} 
endif;






// ================ CLOUDPRESS THEME WOO COMMERCE BREADCRUMB CUSTOMIZE ================== //

add_filter( 'woocommerce_breadcrumb_defaults', 'cloudpress_theme_breadcrumb_defaults');
function cloudpress_theme_breadcrumb_defaults($defaults) {
$defaults['delimiter'] = ''; //whatever delimiter you want
return $defaults;
}





// ================ CLOUDPRESS THEME TAG CLOUDPRESS CUSTOMIZE ================== //
add_filter( 'widget_tag_cloudpress_args', 'cloudpress_theme_tag_cloudpress_args' );
function cloudpress_theme_tag_cloudpress_args( $args ) {
	$args['number'] = 10; // Your extra arguments go here
	$args['largest'] = 18;
	$args['smallest'] = 12;
	$args['unit'] = 'px';
	return $args;
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/class.php';

//require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

