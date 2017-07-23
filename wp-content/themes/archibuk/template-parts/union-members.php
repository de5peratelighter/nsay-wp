<?php
/**
 * Template Name: Члени Спілки
 * The template used for displaying about us page content
 *
 * @package cloudpress
 */
get_header(); 
?>

<section class="page-content">
  <div class="container">
    <div class="text-statute row">
      <?php 
        $text_header = get_field( "text_header" );
        $text_statute = get_field( "text_statute" );
      ?>
      <?php
        echo do_shortcode('[expand  title="'. $text_header. ']'. $text_statute. '[/expand]'); ?>
    
    </div> 
    <div class="row">
        <?php 
            $args = array( 
              'post_type' => 'architectorr');
            $loop = new WP_Query( $args );
            if ( have_posts() ) : ?>              

              <?php /* Start the Loop */ ?>
              <?php while (  $loop->have_posts() ) :  $loop->the_post(); ?>
    
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
        
    </div>
  </div> 
</section> 

<?php get_footer();?>
