<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cloudpress
 */

get_header(); ?>

<section class="page-header" <?php if(get_header_image() ){ ?>style="background:url(<?php header_image(); ?>)"<?php }?>>

    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="theme-bc">
                  <?php echo cloudpress_theme_breadcrumbs(); ?>                    
                </div> <!-- /.end of theme-bc -->
            </div> <!-- /.end of col 12 -->
        </div> <!-- /.end of row -->
        
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div> <!-- /.end of row -->
        
    </div> <!-- /.end of container -->
</section> <!-- /.end of section -->

<section class="single-page">
    <div class="container">
        <div class="row">

          <div class="col-sm-12 detail-content">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'page' ); ?>   

              <?php endwhile; // End of the loop. ?>
          </div> <!-- /.end of col 12 -->

        </div> <!-- /.end of row -->
    </div> <!-- /.end of container -->
</section> <!-- /.end of section -->
<div class="clear-both"></div>
<?php get_footer(); ?>
