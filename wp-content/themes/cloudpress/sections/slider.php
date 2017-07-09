<?php
    $slider = get_theme_mod('slider_disable',1);
    if($slider==1){
    	
 ?>
<section class="theme-slider">
  	<div class="container-fluid">
    	<div class="row">
      		<div class="col-sm-12 clear-both">

	            <div class="slider-cintent">
	              	<div id="carousel-id" class="carousel slide" data-ride="carousel">
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

			                    <li data-target="#carousel-id" data-slide-to="<?php echo $cn; ?>" class="<?php if($cn==0){echo 'active';} ?>"></li>
			                	<?php endwhile;endif; }?>
			                </ol>
		                <?php endif;?>

		                <div class="carousel-inner">
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
			                    
			                    $cn = 0;
			                    if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
			                ?>

                  			<div class="item <?php echo $cn == 1 ? 'active' : ''; ?>">
                    			<div class="container">

                      				<div class="carousel-caption">
				                        <?php if(has_post_thumbnail()){
				                          	$arg =
				                            	array(
					                              'class' => 'img-responsive center-block wow bounceInLeft',
					                              'alt' => '',
					                              'data-wow-duration'=> '2s'
				                          		);
				                          		the_post_thumbnail('full',$arg);
				                        	} 
				                        ?>
				                        <?php $slidertitle_disable= get_theme_mod('slidertitle_disable','1');
	              						if($slidertitle_disable==1):?>
                        					<h1 class="wow bounceInRight" data-wow-duration="3s"><?php the_title();?></h1>
                    					<?php endif;?>
                    					<?php $slidercontent_disable= get_theme_mod('slidercontent_disable','1');
	              						if($slidercontent_disable==1):?>
                        					<p class="wow bounceInRight" data-wow-duration="3s"><?php the_excerpt();?> </p>
                        				<?php endif;?>
                        				<?php $sliderreadmore_disable= get_theme_mod('sliderreadmore_disable','1');
	              						if($sliderreadmore_disable==1):?>
                        					<p class="wow fadeIn" data-wow-duration="4s"><a class="btn btn-theme btn-slider" href="<?php the_permalink();?>" role="button"><?php _e('Read More','cloudpress'); ?></a></p>
                        				<?php endif;?>
                      				</div> <!-- /.end of carousel-caption -->
                    			</div> <!-- /.end of container -->
                  			</div> <!-- /.end of item -->
        
                  			<?php                 
                    			endwhile;
                    				wp_reset_postdata();  
                    			endif;                             
                  				}
                  			?> 
	                	</div>  <!-- /.end of carousel inner -->
              		</div> <!-- /.end of carousel id -->
            	</div> <!-- /.end of slider-cintent -->
          	</div> <!-- /.end of col-sm-12 -->
        </div>
    </div>
</section>
<?php }?>

<div class="clearfix"></div>