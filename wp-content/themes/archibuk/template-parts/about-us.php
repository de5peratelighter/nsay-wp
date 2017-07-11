<?php
/**
 * Template Name: Про Нас
 * The template used for displaying about us page content
 *
 * @package cloudpress
 */
get_header(); 
?>

<section class="page-content">
  <div class="container">       
      <div class="row">
          <?php 
            $images = get_field('architect_list_images');
            
            if( $images ): ?>
                <ul>
                    <?php foreach( $images as $image ): ?>
                        <li>
                            <a href="<?php echo $image['url']; ?>">
                                 <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </a>
                            <p><?php echo $image['caption']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
          </div>
        <div class="row">
            <span><?php echo the_field('about_us_page_name'); ?></span>
            <a href="<?php echo the_field('link_to_union_members'); ?>"><?php echo the_field('link_text_union_members'); ?></a>
       </div>
    </div>
  </div> 
</section> 

<?php get_footer();?>
