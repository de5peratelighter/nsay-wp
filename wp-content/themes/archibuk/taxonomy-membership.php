<?php
/**
 * Custom Category templ
 *
 * @package cloudpress
 */

get_header(); ?>

<div class="clearfix"></div>
<section class="page-content">
  <div class="container">
    <div class="membership-structur-desc">
      <?php $data = get_queried_object();
            $text_header = 'Статут';
            $text_statute = term_description( 186, 'membership' );
            
        if ( $data->term_id == 186 || $data->slug == 'structure') {?>
        <?php echo do_shortcode('[expand title="'. $text_header. ' " trigpos="below"]'. $text_statute. '[/expand]'); ?>
      <?php } ?>
    </div>

    <div class="col-md-12">
        <?php if ( have_posts() ) : ?>              

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

           <?php
              /* Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'template-parts/content-custom',get_post_format() );
            ?>

        	<?php endwhile; ?>

          <?php cloudpress_theme_pagination_bars();?> 

          <?php else : ?>

          <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>
            
    </div> <!-- /.end of row --> 
  </div> <!-- /.end of container -->  
</section>   <!-- /.end of section -->   
  
<?php get_footer();?>
