<?php
/**
 * Template Name: Fullwidth page
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package cloudpress
 */
get_header(); ?>

<section class="page-header" <?php if(get_header_image() ){ ?>style="background:url(<?php header_image(); ?>)"<?php }?>>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="theme-bc">
                    <?php echo cloudpress_theme_breadcrumbs(); ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="element-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 detail-content">
        <div class="col-sm-12 clear-both">
          <div class="single" id="typography">            

            <div class="content">
              <?php /* The loop */ ?>
                  <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                      </header><!-- .entry-header -->

                      <div class="detail-image">
                          <?php if(has_post_thumbnail()){
                            $arg =
                                array(
                                    'class' => 'img-responsive  center-block',
                                    'alt' => ''
                                );
                            the_post_thumbnail('portfolio-thumb',$arg);
                          ?>                
                          <?php }?>
                      </div>

                      <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'cloudpress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                      </div><!-- .entry-content -->

                      <div class="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'cloudpress' ), '<span class="edit-link">', '</span>' ); ?>
                      </div><!-- .entry-meta -->
                    </article><!-- #post -->

                     <?php
                      // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() ) :
                          comments_template();
                        endif;
                      ?>

                
                     <?php endwhile; // end of the loop. ?>
          
            </div><!-- #primary -->
          </div>
        </div>
      </div><!-- .container -->
    </div>
  </div>
</section>
<?php get_footer(); ?>