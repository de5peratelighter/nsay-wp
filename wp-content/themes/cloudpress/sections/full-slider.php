<?php
    $slider = esc_attr(get_theme_mod('slider_disable',1));
    if($slider==1){
      
 ?>
<section class="theme-slider page-template">
  <div class="container-fluid">
    <div class="row">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <?php $carousel= get_theme_mod('slidercarousel_disable','1');
          if($carousel==1):?>
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

            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $cn; ?>" class="<?php if($cn==0){echo 'active';} ?>"></li>
            <?php endwhile;endif; }?>
            </ol>
          <?php endif;?>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
          $cid = esc_attr(get_theme_mod('slider_category_display_full',1));
          $category_link = get_category_link($cid);
          $cloudpress_theme_cat = get_category($cid);
          if ($cloudpress_theme_cat) { ?>          
          <?php 
            global $post;
            $cnum= esc_attr(get_theme_mod('slider_no_of_posts',3));
            $args = array(
              'posts_per_page' => $cnum,
              'paged' => 1,
              'cat' => $cid,
            );
            $loop = new WP_Query($args);
            $cn = 0;
            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
            $image       = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cloudplus-fullwidth-slider-thumb' );
          ?>
          <div class="item <?php echo $cn == 1 ? 'active' : ''; ?>" style="background:url('<?php echo $image[0]; ?>'); background-size:cover; background-position:center">
                <div class="carousel-caption wow slideInUp container page-template-slider" data-wow-duration="2s">
                <div class="row">
                 <div class="content col-sm-6  text-left">
                 <?php if(get_theme_mod('slidertitle_disable','1')==1): ?> 
                     <h1><?php the_title();?></h1>
                <?php endif;?>
                <?php if(get_theme_mod('slidercontent_disable','1')==1): ?> 
                      <?php the_excerpt();?>
                <?php endif;?>
                <?php if(get_theme_mod('sliderreadmore_disable','1')==1): ?>
                    <div class="btn-group">                                               
                     <p class="wow fadeIn" data-wow-duration="4s"><a class="btn  btn-slider" href="<?php the_permalink();?>" role="button"><?php _e('Read More','cloudpress'); ?></a></p>
                     </div>  
                <?php endif;?>            
                  </div>  
                  </div>
              </div> <!-- /.end of carousel-caption -->
            
          </div> <!-- /.end of item -->
      <?php                 
        endwhile;
          wp_reset_postdata();  
        endif;                             
        }
      ?> 
        </div>  <!-- /.end of carousel inner -->
        <!-- Controls -->
        <?php if(get_theme_mod('slidercarousel_disable','1')==1): ?>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <i class="fa fa-chevron-left main-slider-icon" aria-hidden="true"></i>
          <span class="sr-only"><?php echo _e('Previous','cloudpress'); ?></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <i class="fa fa-chevron-right main-slider-icon" aria-hidden="true"></i>
          <span class="sr-only"><?php echo _e('Next','cloudpress'); ?></span>
        </a>
      <?php endif;?>
      </div> <!-- /.end of carousel example -->
    </div> <!-- /.end of row -->
  </div> <!-- /.end of container -->
</section> <!-- /.end of section -->
<?php } ?>

<div class="clearfix"></div>