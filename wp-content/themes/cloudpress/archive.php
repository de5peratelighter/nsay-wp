<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
                </div>  <!-- /.end of theme-bc -->
            </div>  <!-- /.end of col 12 -->
        </div>  <!-- /.end of row -->

        <?php if ( have_posts() ) : ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                <?php
                    the_archive_title( '<h1>', '</h1>' );
                    
                ?>
                </div>
            </div>  <!-- /.end of col 12 -->
        </div>  <!-- /.end of row -->


    </div>  <!-- /.end of container -->
</section>  <!-- /.end of section -->


<section class="page-content">
    <div class="container">

        <div class="row">
            <?php
                $class = 'col-md-12';
                $sidebar =  esc_attr(get_theme_mod('sidebar_position'));
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


            <div class="<?php echo $class;?> clear-both">

           
                <?php while ( have_posts() ) : the_post(); ?>

                	<?php
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content',get_post_format() );
                    ?>

                <?php endwhile; ?>


                    <?php cloudpress_theme_pagination_bars(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

            </div> <!-- /.end of single-post clear-both-->

            <?php  if ($sidebar_value == 'right'){
                get_sidebar('main');
                }
            ?>
        </div>  <!-- /.end of row -->

    </div> <!-- /.end of container -->
</section>  <!-- /.end of section -->

<div class="clear-both"></div>
<?php get_footer();?>