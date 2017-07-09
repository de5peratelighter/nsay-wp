<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cloudpress
 */

get_header(); ?>
<?php if(is_home() || is_front_page()):?>
<?php
    $slider = get_theme_mod('slider_disable',1);
    if($slider==1){
      
 ?>
<section class="theme-slider">
    <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12 clear-both">

              <div class="slider-cintent">
                  <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                      $cid = get_theme_mod('slider_category_display');
                      $category_link = get_category_link($cid);
                      $cloudpresscat = get_category($cid);
                      if ($cloudpresscat) {
                    ?>

                      <?php
                        $posts_per_page = get_theme_mod('slider_no_of_posts',5);
                          $args = array(
                            'posts_per_page' => $posts_per_page,
                            'paged' => 1,
                            'cat' => $cid
                          );
                          $loop = new WP_Query($args);
                          
                          $cn = -1;
                          if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
                      ?>

                        <li data-target="#carousel-id" data-slide-to="<?php echo $cn; ?>" class="<?php if($cn==0){echo 'active';} ?>"></li>
                      <?php endwhile;endif; }?>
                    </ol>

                    <div class="carousel-inner">
                        <?php
                      $cid = get_theme_mod('slider_category_display');
                      $category_link = get_category_link($cid);
                      $cloudpresscat = get_category($cid);
                      if ($cloudpresscat) {
                    ?>

                      <?php
                        $posts_per_page = get_theme_mod('slider_no_of_posts',5);
                          $args = array(
                            'posts_per_page' => $posts_per_page,
                            'paged' => 1,
                            'cat' => $cid
                          );
                          $loop = new WP_Query($args);
                          
                          $cn = 0;
                          if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
                      ?>

                        <div class="item <?php echo $cn == 1 ? 'active' : ''; ?>">
                          <div class="container">

                              <div class="carousel-caption">
                                <?php if(has_post_thumbnail()){
                                    $arg =
                                      array(
                                        'class' => 'img-responsive center-block wow bounceInLeft',
                                        'alt' => '',
                                        'data-wow-duration'=> '2s'
                                      );
                                      the_post_thumbnail('full',$arg);
                                  } 
                                ?>

                                <h1 class="wow bounceInRight" data-wow-duration="3s"><?php the_title();?></h1>
                                <p class="wow bounceInRight" data-wow-duration="3s"><?php the_excerpt();?> </p>
                                <p class="wow fadeIn" data-wow-duration="4s"><a class="btn btn-theme btn-slider" href="<?php the_permalink();?>" role="button"><?php _e('Read More','cloudpress'); ?></a></p>
                              </div> <!-- /.end of carousel-caption -->
                          </div> <!-- /.end of container -->
                        </div> <!-- /.end of item -->
        
                        <?php                 
                          endwhile;
                            wp_reset_postdata();  
                          endif;                             
                          }
                        ?> 
                    </div>  <!-- /.end of carousel inner -->
                  </div> <!-- /.end of carousel id -->
              </div> <!-- /.end of slider-cintent -->
            </div> <!-- /.end of col-sm-12 -->
        </div>
    </div>
</section>
<?php }?>
<?php else: ?>
<section class="page-header">
</section> <!-- /.end of section --> 
<?php endif; ?>
<div class="clearfix"></div>
<section class="page-content">
  <div class="container">       
    <div class="row">
      <?php
			$class = 'col-md-12';
			$sidebar = (is_home() || is_front_page()) ? 'none' : get_theme_mod('sidebar_position');
          
			if ( !empty( $sidebar ) ) {
				$sidebar_value = $sidebar;
			} else {
				$sidebar_value = 'right';
			}
			
			if ( $sidebar_value != 'none' ){
			$class = 'col-md-9';
			}
      ?>          
      
      <?php
          if ($sidebar_value == 'left'){
             
              get_sidebar('main');
             }
      ?>     
      
      <div class="<?php echo $class;?> clear-both">

        <?php if ( have_posts() ) : ?>              

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <?php
              /* Include the Post-Format-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Format name) and that will be used instead.
               */
              get_template_part( 'template-parts/content',get_post_format() );
            ?>

        	<?php endwhile; ?>

          <?php cloudpress_theme_pagination_bars();?> 

          <?php else : ?>

          <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>
      </div> <!-- /.end of post single -->  
            
      <?php  if ($sidebar_value == 'right'){
          get_sidebar('main');
          }
      ?>
    </div> <!-- /.end of row --> 
  </div> <!-- /.end of container -->  
</section>   <!-- /.end of section -->   
  
<?php get_footer();?>
