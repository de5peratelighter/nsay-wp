<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cloudpress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1><?php the_title();?></h1>
	<ul class="list-inline post-info">
		<li><a href=""><i class="fa fa-calendar"></i><?php echo get_the_date('d M Y');?></a></li>
		<li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><i class="fa fa-user"></i> <?php echo esc_attr(get_the_author_meta('display_name'));?></a></li>
		<li><a href=""><i class="fa fa-comments"></i><?php comments_popup_link(esc_html__('zero comment','cloudpress'),esc_html__('one comment','cloudpress'), esc_html__('% comments','cloudpress'));?></a></li>

	</ul>

	<p><?php the_excerpt('cloudpress_theme_excerpt_more');?></p>

	<div class="tag-button">
		<span class="theme-tag pull-left">
			<p><i class="fa fa-tag"></i> <a href=""><?php the_tags();?></a></p>
		</span>

		<span class="read-more pull-right">
			<a href="<?php the_permalink();?>" class="btn btn-theme"><?php _e('Read More','cloudpress'); ?><i class="fa fa-angle-double-right"></i> </a>
		</span>
	</div> <!-- /.end of tag-button -->
</article> <!-- /.end of article -->
