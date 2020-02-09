<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package static
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

    <?php if ( has_post_thumbnail() ) {  ?>
        <figure class="entry-thumb">          
            <a href="<?php the_permalink(); ?>">
                <?php 
                $sidebar_position = static_get_options('blog_sidebar_dispay');
                if ( $sidebar_position == 'full' ) {
                    static_post_featured_image(924, 450, true, false);
                } elseif ( $sidebar_position == 'left' ) {
                   static_post_featured_image(652, 418, true, false);
                } else {
                    static_post_featured_image(652, 418, true, false);
                } ?>            
            </a> 
        </figure><!-- /.entry-thumb -->
    <?php } ?>

    <div class="entry-content"> 
        <?php 
            /* translators: %s: Permalinks of Posts */
            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
        ?>
        <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Read More <i class="gra-arrow-right"></i><span class="screen-reader-text"> "%s"</span>', 'static' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),                  
                            'i' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
        ?>
    </div><!-- /.entry-content -->
</article><!-- /.post -->