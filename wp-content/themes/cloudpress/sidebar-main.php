
<?php if ( is_active_sidebar( 'cloudpress-theme-main-sidebar' ) ) : ?>
	<div class="col-md-3">
		<aside class="sidebar" role="complementary">
			<?php dynamic_sidebar( 'cloudpress-theme-main-sidebar' ); ?>
		</aside>
	</div> <!-- /.end of col 3 -->

<?php else: ?>
	<div class="col-md-3">
		<aside class="sidebar" role="complementary">
			<?php get_search_form(); ?>
			<h3 class="side-title"><?php _e( 'Archives', 'cloudpress' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>           
		</aside>
	</div> <!-- /.end of col 3 -->

<?php endif; ?>


