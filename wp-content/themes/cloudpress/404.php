<?php
/**
 * The template for displaying 404 pages (not found).
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
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="page-not-found">
    <div class="container">
        <div class="row">
            <?php
            $class = 'col-md-12';
            $sidebar =  esc_attr(get_theme_mod('page_not_found_sidebar_position'));
            if ( !empty( $sidebar ) ) {
                $sidebar_value = $sidebar;
            }else {
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

            <div class="<?php echo $class; ?> clear-both">
                <div class="col-sm-12">
                    <h1 class="text-center">
                        <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cloudpress' ); ?>
                    </h1>
                </div>

                <div class="col-sm-12">
                    <div class="not-found">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cloudpress' ); ?></p>

                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>

            <?php  if ($sidebar_value == 'right'){
                get_sidebar('main');
            }
            ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>