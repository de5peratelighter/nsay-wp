<?php
/**
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package cloudpress
 */

get_header(); ?>
   <section class="page-header" <?php if(get_header_image() ){ ?>style="background:url(<?php header_image(); ?>)"<?php }?>>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="theme-bc">
                        <?php echo woocommerce_breadcrumb(); ?>
                    </div>
                </div> <!-- /.end of col 12 -->  
            </div> <!-- /.end of row -->  
        
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title">
                        <?php if (apply_filters( 'woocommerce_show_page_title', true )) : ?>
                            <h1><?php woocommerce_page_title(); ?></h1>                    
                        <?php else : ?>
                            <h1><?php woocommerce_page_title(); ?></h1>                         
                        <?php endif; ?>  
                    </div>
                </div> <!-- /.end of col 12 -->  
            </div> <!-- /.end of row -->  
        
        </div> <!-- /.end of container -->  
    </section> <!-- /.end of section -->  

    <section class="single-page">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <aside class="sidebar">
                        <?php if ( is_active_sidebar( 'woocommerce_left' ) ) : ?>   
                            <?php dynamic_sidebar( 'woocommerce_left' ); ?>
                        <?php endif; ?>
                    </aside>
                </div>

                <div class="col-sm-9 detail-content">
                    <?php woocommerce_content(); ?> 
                </div><!-- #primary -->
            </div>
        </div>
    </section>
<?php get_footer(); ?>