<?php
/**
 * Template Name: Члени Молодої Секції
 * The template used for displaying about us page content
 *
 * @package cloudpress
 */
get_header(); 
?>

<section class="page-content">
  <div class="container">       
        <div class="row">
            <?php 
                $args = array( 
                  'post_type' => 'architector',
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'chlenstvo',   // taxonomy name
                          'field' => 'term_id',           // term_id, slug or name
                          'terms' => 43,                  // term id, term slug or term name
                      )
                  ));
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
