<?php
/**
 *  static Get Featured Image
 *
 * @package static
 * @since 1.0
 */
if ( ! function_exists( 'static_post_featured_image' ) ) :
function static_post_featured_image($width = 900, $height = 600, $crop = false, $mobile = true) {
    if ( wp_is_mobile() && $mobile = true ) {
        if( function_exists('static_aq_resize') ) { 
            $featured_image = static_aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full' ), 409, 275, false ); 
        } else {
            $featured_image = get_the_post_thumbnail_url(get_the_ID(),'full');
        }
        if( $featured_image == false ) {
            the_post_thumbnail( 'full', array( 'alt' => get_the_title() ));
        } else { ?>
        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute( 'before="&after="' ); ?>" />
        <?php }
    } else {
        if( function_exists('static_aq_resize') ) {
            $featured_image = static_aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full' ), $width, $height, $crop );
        } else {
            $featured_image = get_the_post_thumbnail_url(get_the_ID(),'full');
        }
        if( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ) {
            $image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
        } else {
            $image_alt = get_the_title();
        }
        $img_meta = wp_prepare_attachment_for_js( get_post_thumbnail_id() );

        if($img_meta['title'] !== "") {
            $imgtitle = 'title=" '. esc_attr( $img_meta['title'] ) .' "';
        } else {
            $imgtitle = '';
        }
        if( $featured_image == false ) {
            the_post_thumbnail( 'full', array( 'alt' => esc_attr( $image_alt ), 'title' => esc_attr( $img_meta['title'] ) ));
        } else { ?>
            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" <?php echo wp_kses_post( $imgtitle ); ?> />
        <?php }
    }
}
endif;
