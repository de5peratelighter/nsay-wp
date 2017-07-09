<?php
/**
 * The template for displaying search results pages.
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
                    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'cloudpress' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </div>
            </div> <!-- /.end of col 12 -->
        </div> <!-- /.end of row -->
        
    </div> <!-- /.end of container -->
</section> <!-- /.end of section -->


<section class="single-page">
    <div class="container">
        <div class="row">

             <?php
                $class = 'col-md-12';
                $sidebar =  get_theme_mod('search_page_sidebar_position');
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

        	<?php if ( have_posts() ) : ?>
            <div class="<?php echo $class;?>">            	

                <?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

                <div class="col-sm-12">
                    <?php get_template_part( 'template-parts/content', 'search' ); ?>
                </div> <!-- /.end of col 6 -->

                <?php endwhile; ?>
					<div class="col-sm-12"> 
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <?php cloudpress_theme_pagination_bars();?>   
                                </li>
                            </ul>
                        </nav>
                    </div> <!-- /.end of col 12 -->

            </div> <!-- /.end of col 12 -->

                <?php  if ($sidebar_value == 'right'){
                    get_sidebar('main');
                }
                ?>
        </div> <!-- /.end of row -->
        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>


    </div> <!-- /.end of container -->
</section> <!-- /.end of section -->
<div class="clear-both"></div> 

<?php get_footer(); ?>