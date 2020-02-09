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

/**
 *  static Get Image Crop Size By Image ID
 *
 * @package static
 * @since 1.0
 */
if ( ! function_exists( 'static_get_image_crop_size' ) ) :
function static_get_image_crop_size($img_id = false, $width = null, $height = null, $crop = false, $mobile = true) {
    $url = wp_get_attachment_url( $img_id ,'full' );
    if ( wp_is_mobile() && $mobile = true ) {
        if( function_exists(' static_aq_resize ') ) {
            $crop_image = static_aq_resize( $url, 409, 275, false ); 
        } else {
            $crop_image = wp_get_attachment_image_src( $img_id, array(409, 278 ), false )[0];
        }
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    } else {
        if( function_exists(' static_aq_resize ') ) {
            $crop_image = static_aq_resize( $url, $width, $height, $crop ); 
        } else {
            $crop_image = wp_get_attachment_image_src( $img_id, array($width, $crop ), false )[0];
        }
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    }
}
endif;

/**
 *  static Get Image By Post ID
 *
 * @package static
 * @since 1.0
 */
if ( ! function_exists( 'static_get_image_crop_size_by_id' ) ) :
function static_get_image_crop_size_by_id($post_id = false, $width = null, $height = null, $crop = false) {
    $url = get_the_post_thumbnail_url($post_id, 'full');
    if ( wp_is_mobile() ) { 
        if( function_exists('static_aq_resize') ) {
            $crop_image = static_aq_resize( $url, 409, 275, false ); 
        } else {
            $crop_image = wp_get_attachment_image_src( $url, array(409, 715 ), false )[0]; 
        }
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    } else {
        if( function_exists('static_aq_resize') ) {
            $crop_image = static_aq_resize( $url, $width, $height, $crop ); 
        } else {
            $crop_image = wp_get_attachment_image_src( $url, array($width, $crop ), false )[0];
        }
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    }
}
endif;

/**
 *  static Get Image By URL
 *
 * @package static
 * @since 1.0
 */
if ( ! function_exists( 'static_get_image_crop_size_by_url' ) ) :
    function static_get_image_crop_size_by_url($url = false, $width = null, $height = null, $crop = false) {
        if( function_exists('static_aq_resize') ) {
            $crop_image = static_aq_resize( $url, $width, $height, $crop ); 
        } else {
            $crop_image = $url;
        }
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    }
endif;

/**
 *  static Return Page Title
 *
 * @package static
 * @since 1.0
 */
if(! function_exists('static_return_page_title') ) :
    function static_return_page_title() {
        $page_ID = get_queried_object_id();
        return get_the_title($page_ID);
    }
endif;
