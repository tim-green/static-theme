<?php
/**
 * Hooks for template header
 *
 * @package static
 * Custom scripts and styles on header
 *
 * @since  1.0
 */
function static_header_scripts_css() {	
	ob_start();
	get_template_part('/inc/frontend/helpers');	
	$custom_css_code = ob_get_clean(); 
	wp_add_inline_style( 'static-main-style', $custom_css_code );
}
add_action( 'wp_enqueue_scripts', 'static_header_scripts_css', 300 );
