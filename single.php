<?php
/**
 * The template for displaying all single posts.
 *
 * @package static
 * @since 1.0
 */
get_header(); ?>

<!-- Blog Block
================================================== -->
<section class="blog-page-block content-area-main pd-t-220 pd-b-135">
    <div class="container blog-container">
        <div class="row">
            <?php
                if( get_post_meta( get_the_ID(), 'static_sidebar_position', true) && get_post_meta( get_the_ID(), 'static_sidebar_position', true) !=='default' ) {
                    $sidebar_position = get_post_meta( get_the_ID(), 'static_sidebar_position', true);
                    if ( $sidebar_position == 'full' ) {
                        $post_columns_class = 'col-lg-11 full-content';
                        $sidebar_columns_class = '';
                    } elseif ( $sidebar_position == 'left' ) {
                       $post_columns_class = 'col-lg-8 order-last';
                       $sidebar_columns_class = 'col-lg-4 order-first';
                    } else {
                        $post_columns_class = 'col-lg-8';
                        $sidebar_columns_class = 'col-lg-4';
                    }
                } else {
                    $sidebar_position = static_get_options('blog_sidebar_dispay');
                    if ( $sidebar_position == 'full' ) {
                        $post_columns_class = 'col-lg-11 full-content';
                        $sidebar_columns_class = '';
                    } elseif ( $sidebar_position == 'left' ) {
                       $post_columns_class = 'col-lg-8 order-last';
                       $sidebar_columns_class = 'col-lg-4 order-first';
                    } else {
                        $post_columns_class = 'col-lg-8';
                        $sidebar_columns_class = 'col-lg-4';
                    }
                }
            ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="<?php echo esc_attr( $post_columns_class ); ?>">
                <div class="blog-page-content blog-single-page">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                        <?php if ( has_post_thumbnail() ) { ?>
                            <figure class="entry-thumb">
                                <?php 
                                if ( $sidebar_position == 'full' ) {
                                    static_post_featured_image(924, 450, true, false);
                                } elseif ( $sidebar_position == 'left' ) {
                                   static_post_featured_image(652, 418, true, false);
                                } else {
                                    static_post_featured_image(652, 418, true, false);
                                } ?> 
                            </figure><!-- /.entry-thumb -->
                        <?php } ?>

                        <div class="entry-meta">
                            <ul class="meta-list remove-broswer-defult">
                                <li class="entry-date"><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                                <li class="time-need"><i class="fa fa-clock-o"></i> <?php echo wp_kses_post(static_estimated_reading_time( get_the_content() ) ); ?> <?php esc_html_e('Minute to read', 'static'); ?></li>
                                <li class="entry-category"><i class="fa fa-sitemap"></i> <?php the_category(', ' ); ?></li>
                            </ul><!-- /.meta-list -->
                        </div><!-- /.entry-meta -->
                        <div class="entry-content"> 
                            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?> 
                            <?php 
                                the_content(); 
                                static_wp_link_pages(); 
                            ?>
                        </div><!-- /.entry-content -->
                    </article><!-- /.post -->

                    <div class="single-post-footer text-center">
                       
                        <?php if( has_tag() ): ?>
                        <div class="entry-tag">
                            <?php the_tags(' ', ' ', ' '); ?>
                        </div><!-- /.entry-tag -->
                        <?php endif; ?>

                        <?php if ( function_exists( 'static_social_share_link' ) ) {
                            static_social_share_link( esc_html__('Share:', 'static') ); 
                        } ?> 

                        <div class="post-navigation">
                            <?php 
                            $prev_post = get_previous_post(); 
                            if ($prev_post): ?> 
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>" class="older-posts"><i class="gra-arrow-left"></i><span class="navigation-text"><?php esc_html_e('Older Posts', 'static'); ?></span></a>
                            <?php endif; ?>

                            <?php
                            $next_post = get_next_post();
                            if ($next_post): ?>
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr($next_post->post_title); ?>" class="newer-posts"><span class="navigation-text"><?php esc_html_e('Newer Posts', 'static'); ?></span> <i class="gra-arrow-right"></i></a> 
                            <?php endif; ?> 
                        </div><!-- /.post-navigation -->

                    </div><!-- /.single-post-footer -->
                </div><!-- /.blog-page-content -->
                
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif;
                ?>
            </div><!-- /.col-lg-8 -->
            <?php endwhile; ?>
            <?php if( $sidebar_position !=='full' ) { ?>
            <div class="<?php echo esc_attr( $sidebar_columns_class ); ?>">
                <?php get_sidebar(); ?>
            </div><!-- /.col-lg-4 -->
            <?php } ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-block -->

<!-- Mailchimp Block
================================================== -->
<section class="mailchip-block">
    <?php if( function_exists( 'static_mail_chimp_functions' ) ) {
        static_mail_chimp_functions();
    } ?>
</section><!--  /.mailchip-block -->

<?php get_footer(); ?>