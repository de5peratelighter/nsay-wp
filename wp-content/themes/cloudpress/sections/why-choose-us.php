<?php 
	$whyus = get_theme_mod('checkbox_whyus_category_display',1);
	if($whyus==1){
 ?>
<section class="why-choose-us">
  	<div class="container">
    	<div class="row">

      		<div class="col-sm-12">
        		<div class="section-title">
          			<h2><?php echo sanitize_text_field(get_theme_mod('whychooseus_title',__('Why Choose Us','cloudpress'))); ?></h2>
          			<div class="underline"></div>
        		</div>
      		</div>  <!-- /.end of col 12 -->

      <?php if(get_theme_mod('cloudpress_whychooseus_section_page1') == 0 && get_theme_mod('cloudpress_whychooseus_section_page2') == 0 && get_theme_mod('cloudpress_whychooseus_section_page3') == 0 ): ?>
 

      		<?php
		        $cid = get_theme_mod('why_choose_us_category_display');
		        $category_link = get_category_link($cid);
		        $cloudpresscat = get_category($cid);
		        if ($cloudpresscat) {
      		?>

      		<?php
      			$i=0;
      			 $posts_per_page = get_theme_mod('whyus_no_of_posts');
		        $args = array(
		            'posts_per_page' => $posts_per_page,
		           
		            'cat' => $cid
		        );
		        $loop = new WP_Query($args);                                   
		        if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
		        $i++;
		    ?>

      		<div class="col-sm-4">
        		<div class="single text-center">
		          	<div class="icon">
		            	<?php $why_choose_us_icon = sanitize_text_field(get_theme_mod('why_choose_us_icon','fa fa-cloud'));?>
		            	<i class="fa fa-<?php echo $why_choose_us_icon;?>"></i>
		          	</div>

		          	<div class="title">
		            	<a href="<?php the_permalink(); ?>"><h2><?php the_title();?></h2></a>
		            	<div class="underline"></div>
		          	</div>
		          	<div class="content">
		            	<p><?php the_excerpt();?>..</p>
		          	</div>
		        </div>  <!-- /.end of single text-center -->
		    </div>  <!-- /.end of col 4 -->
		     <?php if($i%3==0){ ?>
		    <div class="clear"></div>
		    <?php }?>

      		<?php
		        endwhile;
		         	 wp_reset_postdata();
		        endif; } 
		    ?> 
		<?php else:  ?>
			 <?php 
         $i=-1;
                global $post;
             
                  $whychooseusp[0] = esc_attr(get_theme_mod('cloudpress_whychooseus_section_page1'));
                  $whychooseusp[1] = esc_attr(get_theme_mod('cloudpress_whychooseus_section_page2'));
                  $whychooseusp[2] = esc_attr(get_theme_mod('cloudpress_whychooseus_section_page3'));
                  
                  $whychooseusi[0] = esc_attr(get_theme_mod('cloudpress_whychooseus_section_icon1','fa fa-cloud'));
                  $whychooseusi[1] = esc_attr(get_theme_mod('cloudpress_whychooseus_section_icon2','fa fa-cloud'));
                  $whychooseusi[2] = esc_attr(get_theme_mod('cloudpress_whychooseus_section_icon3','fa fa-cloud'));
                  
                      $args = array (
                          'post_type' => 'page',
                          'post_per_page' => 4,
                          'post__in'         => $whychooseusp,
                          'orderby'           =>'post__in',
                        );

                      $whychooseloop = new WP_Query($args);

                      
                      if ($whychooseloop->have_posts()) :  while ($whychooseloop->have_posts()) : $whychooseloop->the_post();
                     $i++;
    ?>


			<div class="col-sm-4">
        		<div class="single text-center">
		          	<div class="icon">
		            	
		            	<i class="<?php echo $whychooseusi[$i]; ?>"></i>
		          	</div>

		          	<div class="title">
		            	<a href="<?php the_permalink(); ?>"><h2><?php the_title();?></h2></a>
		            	<div class="underline"></div>
		          	</div>
		          	<div class="content">
		            	<p><?php the_excerpt();?>..</p>
		          	</div>
		        </div>  <!-- /.end of single text-center -->
		    </div>  <!-- /.end of col 4 -->
		<?php                 
        endwhile;
        wp_reset_postdata();  
        endif;                             
        
        ?> 


		<?php endif;?>
    	</div>  <!-- /.end of row -->
  	</div> <!-- /.end of container -->
</section>  <!-- /.end of section -->
<?php }?>