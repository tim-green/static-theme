<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'static' ) );

/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on static, use a find and replace
 * to change 'static' to the name of your theme in all the template files
 */
load_theme_textdomain( 'static', get_template_directory() . '/languages' );

/**
 * Add default posts and comments RSS feed links to head.
 * @package static
 * @since 1.0
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 * @package static
 * @since 1.0
 */
add_theme_support( 'title-tag' );

/**
 * Enable support for Post Thumbnails on posts and pages.
 * @package static
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 * @since 1.0
 */
add_theme_support( 'post-thumbnails' );

/**
 * Enable support for register menu
 * @package static
 * @since 1.0
 */
register_nav_menus( 
    array(
        'main-menu' => esc_html__( 'Main Menu', 'static' ),
    ) 
);

/**
 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
 * @package static
 * @since 1.0
 */
add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) 
);

/**
 * Enable support for custom background.
 * @package static
 * @since 1.0
 */
add_theme_support( 'custom-background', apply_filters( 'static_custom_background_args', array (
    'default-color' => 'f8f8ff',
    'default-image' => '',
) ) );

/**
 * Enable support for custom Header Image.
 * @package static
 * @since 1.0
 */
$args = array(
    'flex-width'    => true,
    'width'         => 1920,
    'flex-height'    => true,
    'height'        => 932,
);
add_theme_support( 'custom-header', $args );

/**
 * Enable support for custom Logo Image.
 * @package static
 * @since 1.0
 */
$static_cutom_logo = array(
    'height'      => 30,
    'width'       => 130,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
);
add_theme_support( 'custom-logo', $static_cutom_logo );

/** 
 * Enable selective refresh for widgets.
 *
 * @since 1.0
 */
add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Add Editor Style
 *
 * @since 1.0
 */
// Add support for editor styles.
add_theme_support( 'editor-styles' );

/**
 * Enable support for custom Editor Style.
 *
 * @since 1.0
 */
add_editor_style( 'assets/css/custom-editor-style.css' );

/**
 * Enable fonts Google font family
 *
 * @since 1.0
 */
// Enqueue fonts in the editor.
add_editor_style( static_enqueue_google_font_url( static_get_options( array('body_font', 'Roboto' ) ) ) );

/** 
 * Enable WP Gutenberg Block Style
 *
 * @since 1.0
 */
add_theme_support( 'wp-block-styles' );

/** 
 * Enable WP Gutenberg Align Wide
 *
 * @since 1.0
 */
add_theme_support( 'align-wide' );

/** 
 * Enable Custom Color Scheme For Block Style
 *
 * @since 1.0
 */
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => esc_html__('strong blue','static'),
        'slug'  => 'strong-blue',
        'color' => '#0073aa',
    ),
    array(
        'name'  => esc_html__('lighter blue','static'),
        'slug'  => 'lighter-blue',
        'color' => '#229fd8',
    ),
    array(
        'name'  => esc_html__('very light gray','static'),
        'slug'  => 'very-light-gray',
        'color' => '#eee',
    ),
    array(
        'name'  => esc_html__('very dark gray','static'),
        'slug'  => 'very-dark-gray',
        'color' => '#444',
    )
) );