<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cloudpress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> 

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
<header role="banner">
  <section class="logo-nav-sec">
      <div class="container">
        <div class="row logo-nav">
            <div class="col-sm-3">
                <div class="logo">
 
               <?php if ( has_custom_logo() ): ?>
                        <div class="site_logo">
                                          <?php if ( has_custom_logo()): the_custom_logo(); else: ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1></a><?php endif; ?>
                        </div>
                        <?php else : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('title'); ?></a></h1>
                    <?php endif;?>

                    <?php $description = get_bloginfo( 'description', 'display' ); ?>

                    <?php if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>

                </div> <!-- end of logo -->
            </div> <!-- end of col-3 -->

            <div class="col-sm-8">
                <!-- Desktop Menu -->
                <div class="theme-nav pull-right">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only"><?php _e('Toggle navigation','cloudpress');?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>  <!-- end of navbar-header -->

                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <?php
                            wp_nav_menu( array(
                                    'menu'              => 'primary',
                                    'theme_location'    => 'primary',
                                    'depth'             => 8,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker())
                            );
                            ?>
                        <?php else : ?>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <?php
                                $args = array(
                                    'depth'        => 0,
                                    'echo'         => 1,
                                    'post_type'    => 'page',
                                    'post_status'  => 'publish',
                                    'show_date'    => '',
                                    'sort_column'  => 'menu_order',
                                    'title_li'     => __('','cloudpress'),
                                    'walker'       => new cloudpress_Walker_Page
                                );
                                wp_list_pages( $args );
                                ?>
                            </ul>
                        </div>
                        <?php endif; ?><!-- end of navbar-collapse -->

                    </div>  <!-- end of bavbar-default -->
                </div> <!-- end of theme-nav -->
            </div> <!-- end of col-8 -->
            <?php $search_enable= get_theme_mod('search_option_display','1');
                if($search_enable==1):
           ?>
            <div class="col-sm-1">
        <span class="pull-right top-search hidden-xs">
          <button type="button" class="btn navbar-search-theme" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-search"></i>
          </button>

           <!-- Modal -->

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">

                     
                          <?php echo get_search_form(); ?>
                     
                  </div> <!-- end of modal-content -->
              </div> <!-- end of modal-dialog -->
          </div> <!-- end of modal-fade -->
        </span>
            </div> <!-- end of col-1 -->
          <?php endif;?>

        </div> <!-- end of row-logo-nav -->
      </div> <!-- end of container -->
  </section> <!-- end of section -->
</header> <!-- /.end of header -->