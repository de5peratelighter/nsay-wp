<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package cloudpress
 */

?>

<?php
  $class = 'col-md-12';
  $sidebar =  get_theme_mod('single_page_sidebar_position');
    if ( !empty( $sidebar ) ) {
        $sidebar_value = $sidebar;
    }else {
        $sidebar_value = 'right';
    }
   if( $sidebar_value != 'none'){
      $class = 'col-md-9';
  }
?>          
  
<?php
  if ($sidebar_value == 'left'){
     
      get_sidebar('main');
     }
?>
    
<div class="<?php echo $class;?> detail-content">
  <div class="detail-image">
      <?php if(has_post_thumbnail()){
        $arg =
            array(
                'class' => 'img-responsive  left-block',
                'alt' => ''
            );
        the_post_thumbnail('full',$arg);
      ?>                
      <?php }?>
  </div> <!-- /.end of detail-image -->

  <div class="clearfix visible-xs"></div>

  <article>
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'cloudpress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
  </article> <!-- /.end of article -->

  <div class="entry-meta">
    <?php edit_post_link( __( 'Edit', 'cloudpress' ), '<span class="edit-link">', '</span>' ); ?>
  </div><!-- .entry-meta -->

  <?php comments_template(); ?>
    <div class="clearfix"></div>
</div> <!-- /.end of detail-content -->

<?php  if ($sidebar_value == 'right'){
  get_sidebar('main');
  }
?>