<?php
/**
 * Template part for displaying single posts.
 *
 * @package cloudpress
 */

?>

<?php
	$class = 'col-md-12';
	$sidebar = ($post->post_type == 'architector') ? 'none' : get_theme_mod('single_post_sidebar_position');
	
	if ( !empty( $sidebar ) ) {
		$sidebar_value = $sidebar;
	} else {
		$sidebar_value = 'right';
	}

	if( $sidebar_value != 'none' ){
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
      <?php if (has_post_thumbnail()) : ?>
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('full'); ?></a>
		  <div class="detail-date">
			  <div class="year"><?php echo get_the_date(get_option('date_format'));?></div>
		  </div>
      <?php endif; ?>
  	</div> <!-- /.end of detail-image -->

	<div class="clearfix visible-xs"></div>

	<article>
		<?php the_content();?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cloudpress' ),
				'after'  => '</div>',
			) );
		?>
	</article> <!-- /.end of article -->

	<div class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'cloudpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-meta -->


	<?php comments_template();?> <!-- /.end comment -->
	<div class="clearfix"></div>
</div><!-- /.end of deatil-content -->

<?php  if ($sidebar_value == 'right'){
  get_sidebar('main');
  }
?>    
