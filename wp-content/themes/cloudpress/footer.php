<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cloudpress
 */

?>
<footer>
  <div class="container">

    <?php if ( get_theme_mod('socialicon_display','1' ) == '1' ) : ?>
      <div class="row social-media center-xs">

        <div class="col-sm-6">
          <div class="title">
            <h1><?php echo esc_attr(get_theme_mod('social_title','Connect with us on social media')); ?></h1>
          </div>
        </div> <!-- /.end of col-sm-6 -->

        <div class="col-sm-6">
          <div class="social-icon text-right center-xs">
            <ul class="list-inline">
              <?php
              $facebook =  get_theme_mod('facebook_textbox','#');
              $twitter = get_theme_mod('twitter_textbox','#');
              $googleplus = get_theme_mod('googleplus_textbox','#');
              $youtube = get_theme_mod('youtube_textbox','#');
              $linkedin = get_theme_mod('linkedin_textbox','#');
              $skype = get_theme_mod('skype_textbox','#');
              $pinterest = get_theme_mod('pinterest_textbox','#');
              $instagram = get_theme_mod('instagram_textbox','#');
              $tumblr = get_theme_mod('tumblr_textbox','#');

              if($facebook){?>
                <li><a href="<?php echo esc_url( $facebook );?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <?php }
              if($twitter){?>
                <li><a href="<?php echo esc_url( $twitter );?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <?php }
              if($googleplus) {?>
                <li><a href="<?php echo esc_url( $googleplus );?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <?php }
              if($youtube){?>
                <li><a href="<?php echo esc_url( $youtube );?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
              <?php }
              if($linkedin){?>
                <li><a href="<?php echo esc_url( $linkedin );?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <?php }?>
             <?php if($skype){?>
                <li><a href="<?php echo esc_url( $skype );?>" target="_blank"><i class="fa fa-skype"></i></a></li>
              <?php }?>
              <?php if($pinterest){?>
                <li><a href="<?php echo esc_url( $pinterest );?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
              <?php }?>
              <?php if($instagram){?>
                <li><a href="<?php echo esc_url( $instagram );?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <?php }?>
              <?php if($tumblr){?>
                <li><a href="<?php echo esc_url( $tumblr );?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
              <?php }?>
            </ul>
          </div> <!-- /.end of social icon -->
        </div>  <!-- /.end of col-sm-6 -->
      </div> <!-- /.end of row social media -->
    <?php endif; ?>

    <div class="row">
      <?php dynamic_sidebar( 'Footer sidebar' ); ?>      
    </div>
  </div> <!-- /.end of container -->


  <section class="copyright">
    <div class="container">
      <div class="row xs-center">
        <div class="col-sm-4">
          <p><?php echo sanitize_text_field(get_theme_mod( 'copyright_textbox', __('&copy; 2015. YOUR THEME. All Rights Reserved.','cloudpress') )); ?></p>
        </div>
        <div class="col-sm-4 right-md">
       <p> <?php echo __('Theme CloudPress by ','cloudpress'); ?> <a href="http://oceanwebthemes.com"> <?php echo __('Oceanwebthemes','cloudpress'); ?>  </a>   </p>   </div> 
         <?php if ( get_theme_mod('footermenu_display','1' ) == '1' ) : ?>
          <div class="col-sm-4 right-md">   
            <?php 
              wp_nav_menu( array(
                'theme_location' => 'secondary', 
                'container' => '', 
                'container_class' => 'sf-menu dropdown',
                'container_id'    => '',
                'menu_class'      => 'list-inline',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'depth'           => 0,
                'walker'          => ''
                )); 
            ?>               
          </div> <!-- /.end of col-sm-6 -->
      <?php endif;?>
      </div> <!-- /.end of row xs -->
    </div>  <!-- /.end of container -->
  </section> <!-- /.end of section -->
</footer> <!-- /.end of footer -->
		<!-- Tab to top scrolling -->
     <?php if ( get_theme_mod('scrolltotop_option_display','1' ) == '1' ) : ?>
  		<div class="scroll-top-wrapper"> 
  	      	<span class="scroll-top-inner">
  	        	<i class="fa fa-2x fa-angle-up"></i>
  	      	</span>
  		</div>
    <?php endif;?> 		
		<?php wp_footer(); ?>
	</body>
</html>
