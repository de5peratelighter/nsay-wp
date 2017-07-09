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
			<div class="logo-nav">
      
      
			  	<?php if ( has_nav_menu( 'header-menu' ) ): ?>
			  		<div class="row header-menu right-md">
						<?php wp_nav_menu( array(
							'menu'              => 'header',
							'theme_location'    => 'header-menu',
							'menu_class'        => 'list-inline',
							'container'         => '',
							'container_class'   => '',
						)); ?>
				
						<ul id="menu-loginout" class="list-inline">
							<li class="menu-item"><?php wp_loginout($_SERVER['REQUEST_URI']); ?></li>
						</ul>
				
						<?php echo archibuk_language_switcher('language-switcher', 'list-inline');  ?>
				
					</div>
				<?php endif; ?>
      
        
                <div class="row logo">
 					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('title'); ?></a></h1>

					<?php $description = get_bloginfo( 'description', '' ); ?>
					<?php if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo str_replace('|', '<br />', $description); ?></p>
					<?php endif; ?>
					
					<?php if ( has_custom_logo() ): ?>
						<div class="site_logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php endif;?>
                </div> <!-- end of logo -->


                <div class="row theme-nav">
                    <div class="navbar navbar-default" role="navigation">

                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <?php
                            wp_nav_menu( array(
                                    'menu'              => 'primary',
                                    'theme_location'    => 'primary',
                                    'depth'             => 0,
                                    'container'         => 'div',
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


        </div> <!-- end of row-logo-nav -->
      </div> <!-- end of container -->
  </section> <!-- end of section -->
</header> <!-- /.end of header -->
