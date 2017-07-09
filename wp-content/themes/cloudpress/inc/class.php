<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class cloudpress_theme_Customize_Dropdown_Taxonomies_Control
 */
class cloudpress_theme_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

  public $type = 'dropdown-taxonomies';

  public $taxonomy = '';


  public function __construct( $manager, $id, $args = array() ) {

    $our_taxonomy = 'category';
    if ( isset( $args['taxonomy'] ) ) {
      $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
      if ( true === $taxonomy_exist ) {
        $our_taxonomy = esc_attr( $args['taxonomy'] );
      }
    }
    $args['taxonomy'] = $our_taxonomy;
    $this->taxonomy = esc_attr( $our_taxonomy );

    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {

    $tax_args = array(
      'hierarchical' => 0,
      'taxonomy'     => $this->taxonomy,
    );
    $all_taxonomies = get_categories( $tax_args );

    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
         <select <?php echo $this->link(); ?>>
            <?php
              printf('<option value="%s" %s>%s</option>', '', selected($this->value(), '', false),__('Select', 'cloudpress') );
             ?>
            <?php if ( ! empty( $all_taxonomies ) ): ?>
              <?php foreach ( $all_taxonomies as $key => $tax ): ?>
                <?php
                  printf('<option value="%s" %s>%s</option>', $tax->term_id, selected($this->value(), $tax->term_id, false), $tax->name );
                 ?>
              <?php endforeach ?>
           <?php endif ?>
         </select>

    </label>
    <?php
  }

}


if ( ! class_exists( 'Walker_Page' ) )
  return NULL;

/**
 * Class cloudpress_Walker_Page
 */
class cloudpress_Walker_Page extends Walker_Page {

  /**
   * @see Walker::start_lvl()
   * @since 2.1.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int    $depth  Depth of page. Used for padding.
   * @param array  $args
   */
  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class='dropdown-menu'>\n";
  }

  /**
   * @see Walker::end_lvl()
   * @since 2.1.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int    $depth  Depth of page. Used for padding.
   * @param array  $args
   */
  public function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  /**
   * @see Walker::start_el()
   * @since 2.1.0
   *
   * @param string $output       Passed by reference. Used to append additional content.
   * @param object $page         Page data object.
   * @param int    $depth        Depth of page. Used for padding.
   * @param int    $current_page Page ID.
   * @param array  $args
   */
  function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
    if ( $depth ) {
      $indent = str_repeat( "\t", $depth );
    } else {
      $indent = '';
    }

    $css_class = array( 'page_item', 'page-item-' . $page->ID );

    if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
      $css_class[] = 'page_item_has_children';
    }

    if ( ! empty( $current_page ) ) {
      $_current_page = get_post( $current_page );
      if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
        $css_class[] = 'current_page_ancestor';
      }
      if ( $page->ID == $current_page ) {
        $css_class[] = 'active';
      } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
        $css_class[] = 'current_page_parent';
      }
    } elseif ( $page->ID == get_option('page_for_posts') ) {
      $css_class[] = 'current_page_parent';
    }

    $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

    /** This filter is documented in wp-includes/post-template.php */
    if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
      $output .= $indent . sprintf(
              '<li class="%s"><a href="%s">%s%s%s <span class="caret"></span></a>',
              $css_classes,
              get_permalink( $page->ID ),
              $args['link_before'],
              apply_filters( 'the_title', $page->post_title, $page->ID ),
              $args['link_after']
          );
    } else {
      $output .= $indent . sprintf(
              '<li class="%s"><a href="%s">%s%s%s</a>',
              $css_classes,
              get_permalink( $page->ID ),
              $args['link_before'],
              apply_filters( 'the_title', $page->post_title, $page->ID ),
              $args['link_after']
          );
    }

  }
  /**
   * @see Walker::end_el()
   * @since 2.1.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $page Page data object. Not used.
   * @param int    $depth Depth of page. Not Used.
   * @param array  $args
   */
  public function end_el( &$output, $page, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }

}

if ( ! class_exists( 'Walker_Comment' ) )
  return NULL;

/**
 * Class cloudpress_Walker_Comment
 */
class cloudpress_Walker_Comment extends Walker_Comment {
  var $tree_type = 'comment';
  var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );



  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 2; ?>

    <div class="child-single">

  <?php }


  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 2; ?>

    </div>

  <?php }


  function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;
    $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

    if ( 'article' == $args['style'] ) {
      $tag = 'article';
      $add_below = 'comment';
    } else {
      $tag = 'article';
      $add_below = 'comment';
    } ?>

    <div class="single" id="comment-<?php comment_ID() ?>" itemprop="comment">
    <div class="image">
      <?php echo get_avatar( $comment, 65); ?>
    </div>
    <div class="content">
      <h3 class="clearfix">
        <span class="pull-left"><?php comment_author(); ?></span>
        <span class="pull-right"><?php comment_date('M d, Y') ?></span>
      </h3>
      <?php edit_comment_link(__('Edit','cloudpress'), '<h5 class="edit-comment">', '</h5>'); ?>
      <?php comment_text();?>

      <?php
      comment_reply_link(
          array_merge(
              $args,
              array(
                  'add_below' => $add_below,
                  'depth' => $depth,
                  'max_depth' => $args['max_depth']
              )
          )
      )
      ?>
    </div>


  <?php }


  function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

    </div>

  <?php }

}




