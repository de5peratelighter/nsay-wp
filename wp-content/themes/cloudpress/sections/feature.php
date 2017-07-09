<?php

$ow_display_features_category = get_theme_mod('checkbox_features_category_display');

if ( $ow_display_features_category != 0 ) { ?>

	<section class="features">
		<div class="container">
			<div class="row">

				<div class="col-sm-12">
					<div class="section-title">
						<h2><?php echo sanitize_text_field(get_theme_mod('feature_title',__('Features','cloudpress'))); ?></h2>
						<div class="underline"></div>
					</div>
				</div>  <!-- /.end of col 12 -->

				<div class="col-sm-12">
					<div class="feature-slider">
						<div id="carousel-id1" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$cid = get_theme_mod('features_category_display');
								$category_link = get_category_link($cid);
								$cloudpresscat = get_category($cid);
								if ($cloudpresscat) {
									?>

									<?php
									$posts_per_page = get_theme_mod('features_no_of_posts',5);
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
																'class' => 'img-responsive center-block ',
																'alt' => '',
															);
														the_post_thumbnail('cloudpress-feature-thumb',$arg);
													}
													?>
													<div class="captionText">
														<h1><?php the_title();?></h1>
														<p><?php the_excerpt();?></p>
														<p><a class="btn btn-theme" href="<?php the_permalink(); ?>" role="button"><?php _e('Read More','cloudpress'); ?></a></p></div>
												</div>
											</div>
										</div> <!-- /.end of item -->

										<?php
									endwhile;
										wp_reset_postdata();
									endif;
								}
								?>
							</div> <!-- /.end of carousel inner -->

							<a class="left carousel-control" href="#carousel-id1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
							<a class="right carousel-control" href="#carousel-id1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

						</div> <!-- /.end of carousel id1 -->
					</div> <!-- /.end of featured slider -->
				</div> <!-- /.end of col-sm-12 -->
			</div> <!-- /.end of row -->
		</div> <!-- /.end of container-->
	</section> <!-- /.end of section -->

<?php } ?>

<div class="clearfix"></div>