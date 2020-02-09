<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'static' ) );

// enqueue styles
wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) );
wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.css' ) );
wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ) ); 
wp_enqueue_style( 'swiper', get_theme_file_uri( '/assets/css/swiper.min.css' ) );
wp_enqueue_style( 'static-icon', get_theme_file_uri( '/assets/css/static-icon.css' ) );
wp_enqueue_style( 'static-style', get_theme_file_uri( '/assets/css/style.css' ) ); 
wp_enqueue_style( 'static-main-style', get_stylesheet_uri() ); 
wp_enqueue_style( 'app', get_theme_file_uri( '/assets/build/app.min.css' ) );

// enqueue scripts
$suffix   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

wp_enqueue_script( 'modernizr', get_theme_file_uri( '/assets/js/modernizr'. $suffix . '.js' ), array('jquery'), false, false);
wp_enqueue_script( 'popper', get_theme_file_uri( '/assets/js/popper'. $suffix . '.js' ), array('jquery'), false, true);
wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap'. $suffix . '.js' ), array('jquery'), false, true);
wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel'. $suffix . '.js' ), array('jquery'), false, true);
wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.pkgd'. $suffix . '.js' ), array('jquery'), false, true);
wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/jquery.fitvids.js' ), array('jquery'), false, true);
wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup'. $suffix . '.js' ), array('jquery'), false, true);
wp_enqueue_script( 'swiper', get_theme_file_uri( '/assets/js/swiper'. $suffix . '.js' ), array('jquery'), false, true);

wp_enqueue_script( 'static-main', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), false, true);

wp_enqueue_script( 'masonry' );

wp_localize_script('static-main', 'static', array (
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'scroll_top' => static_get_options('scroll_top_btn'),
        'sticky_contact' => static_get_options('sticky_contact_btn'),
        'sticky_contact_url' => static_get_options(array('sticky_contact_url','#')),
    )
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}
