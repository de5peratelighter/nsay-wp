<?php
/**
 * The template for displaying content .
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cloudpress
 */

 ?>     
   
	                
<div class="post-single">               
    <div class="col-sm-6">
        <div class="post-image">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('cloudpress-blog-thumb'); ?></a>
                <?php else : ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/no-blog-thumbnail.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
            <?php endif; ?>             
                
            <div class="post-category">
                <?php
                $cats = get_the_category();
                foreach ( $cats as $cat ){
                    $cat_array[] = '<a href="'.esc_url( get_category_link( $cat->term_id ) ).'">'.$cat->cat_name.'</a>';
                }
                echo join( ', ', $cat_array );
                ?>
            </div>
        </div>
    </div> <!-- /.end of col 6 -->

    <div class="col-sm-6">
        <article>
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <ul class="list-inline post-info">
                <li><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d')); ?>"><i class="fa fa-calendar"></i> &nbsp; <?php echo get_the_date('d M Y');?></a></li>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><i class="fa fa-user"></i>  &nbsp;<?php echo esc_attr(get_the_author_meta('display_name'));?></a></li>
                <li><a href=""><i class="fa fa-comments"></i> &nbsp; <?php comments_popup_link(esc_html__('zero comment','cloudpress'),esc_html__('one comment','cloudpress'), esc_html__('% comments','cloudpress'));?></a></li>
            </ul>
            
            <p><?php the_excerpt('cloudpress_theme_excerpt_more');?></p>
            
            <div class="tag-button">
                <span class="theme-tag pull-left">                            
                  <?php  if(has_tag()):?>  <p><i class="fa fa-tag"></i> <a href=""><?php the_tags();?></a></p><?php endif; ?>
                </span>

                <span class="read-more pull-right">
                    <a href="<?php the_permalink();?>" class="btn btn-theme"><?php _e('Read More ','cloudpress') ?><i class="fa fa-angle-double-right"></i> </a>
                </span>
            </div>
        </article> <!-- /.end of article -->
    </div> <!-- /.end of col 6 -->
</div>                  
                
<div class="clear-both"></div>