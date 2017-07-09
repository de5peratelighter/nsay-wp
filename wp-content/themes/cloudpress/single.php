<?php
/**
 * The template for displaying all single posts.
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
                </div>
            </div> <!-- /.end of col 12 -->  
        </div> <!-- /.end of row -->  
        
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div> <!-- /.end of col 12 -->  
        </div> <!-- /.end of row -->  
        
    </div> <!-- /.end of container -->  
</section> <!-- /.end of section -->  

<section class="single-page">
    <div class="container">
        <div class="row">

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'single' ); ?>

            <?php endwhile; // End of the loop. ?>

		</div> <!-- /.end of row -->
	</div> <!-- /.end of container -->  
</section> <!-- /.end of section -->  
<div class="clear-both"></div>
<?php get_footer(); ?>
