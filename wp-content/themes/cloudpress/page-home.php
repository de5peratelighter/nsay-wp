<?php
/**
 * Template Name: Frontpage
 * The template used for displaying fullwidth page content in template-home.php
 *
 * @package cloudpress
 */
get_header(); 

		 get_template_part( 'sections/slider');
		 get_template_part( 'sections/feature');
		 get_template_part( 'sections/cta');
		 get_template_part( 'sections/why-choose-us');
		 get_template_part( 'sections/services');

 get_footer();?>
