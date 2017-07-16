<?php
/**
 * The template for displaying cont .
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cloudpress
 */

 ?>     
   
	                
<div class="post-single union col-md-6">               
    <article>
        <div class="col-md-5">
            <img src="<?php echo the_field('member_photo_small'); ?>" />
        </div>
        
        <div class="col-md-7">
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <p><?php echo the_field('member_position'); ?></p>
            <p><?php echo the_field('member_activities'); ?></p>
            <p><?php echo the_field('member_contacts'); ?></p>
        </div>
        
    </article>
</div>      



                
<div class="clear-both"></div>
