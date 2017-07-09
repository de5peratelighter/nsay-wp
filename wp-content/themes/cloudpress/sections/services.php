<div class="clearfix"></div>
<?php 
	$services = get_theme_mod('checkbox_services_category_display',1);
	if($services==1){
 ?>
<section class="our-services">
  	<div class="container">
    	<div class="row">

	      	<div class="col-sm-12">
	        	<div class="section-title">
	          	<h2><?php echo sanitize_text_field(get_theme_mod('ourservices_title',__('Our Services','cloudpress'))); ?></h2>
	          	<div class="underline"></div>
	        	</div>
	      	</div>  <!-- /.end of col 12 -->
	      	<?php if(get_theme_mod('cloudpress_services_section_page1') == 0 && get_theme_mod('cloudpress_services_section_page2') == 0 && get_theme_mod('cloudpress_services_section_page3') == 0 && get_theme_mod('cloudpress_services_section_page4') == 0 ): ?>
 

		    <?php
		        $cid = get_theme_mod('our_services_display');
		        $category_link = get_category_link($cid);
		        $cloudpresscat = get_category($cid);
		        if ($cloudpresscat) {
		    ?>

		    <?php
		    	$i=0;
		    	 $posts_per_page = get_theme_mod('services_of_posts');
		        $args = array(
		            'posts_per_page' => $posts_per_page,
		          
		            'cat' => $cid
		        );
		        $loop = new WP_Query($args);                                   
		        if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
		        $i++;
		    ?>

      		<div class="col-sm-6">
        		<div class="single">
          			<div class="icon">
			            <?php 
			       	      	$our_services_icon =  sanitize_text_field(get_theme_mod('our_services_icon','fa fa-cloud'));?>
			            <i class="fa fa-<?php echo $our_services_icon;?>"></i>
			        </div>

          			<div class="content">
            			<h2><?php the_title();?></h2>
						<?php the_excerpt();?>
						<span><a href="<?php the_permalink();?>" class="read-more"><?php _e('Read More','cloudpress'); ?></a></span>
          			</div>
        		</div>
      		</div>  <!-- /.end of col 6 -->
      		<?php if($i%2==0){ ?>
		    <div class="clear"></div>
		    <?php }?>

      		<?php
		        endwhile; 
		          	wp_reset_postdata();
		        endif; }
		    ?>
		<?php else:?>
			<?php 
         $i=-1;
                global $post;
             
                  $servicep[0] = esc_attr(get_theme_mod('cloudpress_services_section_page1'));
                  $servicep[1] = esc_attr(get_theme_mod('cloudpress_services_section_page2'));
                  $servicep[2] = esc_attr(get_theme_mod('cloudpress_services_section_page3'));
                  $servicep[3] = esc_attr(get_theme_mod('cloudpress_services_section_page4'));
                  
                  $servicei[0] = esc_attr(get_theme_mod('cloudpress_services_section_icon1','fa fa-cloud'));
                  $servicei[1] = esc_attr(get_theme_mod('cloudpress_services_section_icon2','fa fa-cloud'));
                  $servicei[2] = esc_attr(get_theme_mod('cloudpress_services_section_icon3','fa fa-cloud'));
                  $servicei[3] = esc_attr(get_theme_mod('cloudpress_services_section_icon4','fa fa-cloud'));
                  
                      $args = array (
                          'post_type' => 'page',
                          'post_per_page' => 4,
                          'post__in'         => $servicep,
                          'orderby'           =>'post__in',
                        );

                      $serviceloop = new WP_Query($args);

                      
                      if ($serviceloop->have_posts()) :  while ($serviceloop->have_posts()) : $serviceloop->the_post();
                     $i++;
    ?>
			<div class="col-sm-6">
        		<div class="single">
          			<div class="icon">
			           
			            <i class="<?php echo $servicei[$i]; ?>"></i>
			        </div>

          			<div class="content">
            			<h2><?php the_title();?></h2>
						<?php the_excerpt();?>
						<span><a href="<?php the_permalink();?>" class="read-more"><?php _e('Read More','cloudpress'); ?></a></span>
          			</div>
        		</div>
      		</div>  <!-- /.end of col 6 -->
      	<?php                 
        endwhile;
        wp_reset_postdata();  
        endif;                             
        
        ?> 

		<?php endif;?>
    	</div>  <!-- /.end of row -->
  	</div>  <!-- /.end of container -->
</section>  <!-- /.end of section -->
<?php }?>