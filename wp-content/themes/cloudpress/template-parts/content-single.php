<?php
/**
 * Template part for displaying single posts.
 *
 * @package cloudpress
 */

?>


<?php
  $class = 'col-md-12';
  $sidebar =  get_theme_mod('single_post_sidebar_position');
	if ( !empty( $sidebar ) ) {
		$sidebar_value = $sidebar;
	}else {
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
			  <div class="month-day"><?php echo get_the_date('d M');?></div>
			  <div class="year"><?php echo get_the_date('Y');?></div>
		  </div>
      <?php endif; ?>


      
  </div> <!-- /.end of detail-image -->

  <div class="post-info">
    <p>
    	<span class="pull-left info">
          <ul class="list-inline">
            	<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><li><i class="fa fa-user"></i> <?php echo esc_attr(get_the_author_meta('display_name'));?></li></a>
            	<li><i class="fa fa-comments"></i>  <?php comments_popup_link(esc_html__('zero comment','cloudpress'),esc_html__('one comment','cloudpress'), esc_html__('% comments','cloudpress'));?></li>
          </ul>
    	</span>

    </p>
	</div> <!-- /.end of post-info -->

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

	<div class="author">
		<div class="general-info col-md-5 col-sm-5">
  			<div class="img-responsive pull-left"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?></div>
  			
        <div class="short-info">
    			<strong><?php echo esc_attr(get_the_author_meta( 'display_name')); ?></strong><br>
    			<?php esc_attr(the_author_meta('url')); ?><br>
   				<?php echo esc_attr(get_the_author_meta('email')); ?> 
  			</div>
		</div>

		<div class="details col-md-7 col-sm-7">              
  			<p> <?php echo esc_attr(get_the_author_meta( 'description')); ?> </p>
		</div>
	</div>  <!-- /.end of author -->

	<?php comments_template();?> <!-- /.end comment -->
	<div class="clearfix"></div>
</div><!-- /.end of deatil-content -->

<?php  if ($sidebar_value == 'right'){
  get_sidebar('main');
  }
?>    