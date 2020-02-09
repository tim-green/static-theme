<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package static
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function static_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'static_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function static_jetpack_setup
add_action( 'after_setup_theme', 'static_jetpack_setup' );

function static_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', get_post_format() );
	}
} // end function static_infinite_scroll_render