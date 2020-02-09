<?php
/**
 * Customizer functionality for the theme.
 *
 * @package static
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(! class_exists( 'static_Customizer' ) ) {
	/**
	 * The static Customizer Settings
	 */
	class static_Customizer  {
		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			//add customizer settings control
			add_filter( 'static_filter_features', array( $this, 'static_filter_features') );

			//includes all files of controls
			add_action( 'after_setup_theme', array($this, 'static_include_features'), 0 );

			//Include JS Controls Types
			add_action( 'customize_register', array($this, 'static_register_control_types'), 0 );

			//Include Preview Unit JS
			add_action( 'customize_preview_init', array($this, 'static_customize_preview_js') );

			//Include Controls Scripts
			add_action( 'customize_controls_enqueue_scripts', array($this, 'static_panels_js') );
		}

		/**
		 * Filter The customizer Panel.
		 * @since 1.0
		 */
		public function static_filter_features( $array ) {
			$files_to_load = array(
				'typography/typography-settings',
				'customizer-toggle-control/class-customizer-toggle-control',
				'customizer-radio-image/class/class-customize-control-radio-image',
				'customizer-alpha-color-picker/class-customize-alpha-color-control',
				'customizer-repeater/class/class-customizer-repeater-control',
			);
			
			return array_merge(
				$array, $files_to_load
			);
		}

		/**
		 * Include All files.
		 *
		 * @since static 1.0
		 */
		public function static_include_features() {
			$static_allowed_phps = array();
			$static_allowed_phps = apply_filters( 'static_filter_features', $static_allowed_phps );
			foreach ( $static_allowed_phps as $file ) {
				$static_file_to_include = get_template_part('/inc/customizer/'. $file );
			}
		}

		/**
		 * Register JS control types.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function static_register_control_types( $wp_customize ) {
			get_template_part('inc/customizer/customizer-range-value/class/class-customizer-range-value-control');
			get_template_part('inc/customizer/customizer-select-multiple/class/class-select-multiple');
			get_template_part('inc/customizer/customizer-dimensions/class-control-dimensions');

			// Register JS control types.
			$wp_customize->register_control_type( 'static_Select_Multiple' );
			$wp_customize->register_control_type( 'static_Customizer_Dimensions_Control' );
			$wp_customize->register_control_type( 'static_Customizer_Range_Value_Control' );
		}

		/**
		 * Customizer Preview Unit JS.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function static_customize_preview_js() {
		    wp_enqueue_script('static-customize-preview', get_theme_file_uri( '/assets/custom/customize-preview.js' ), array("jquery"), '1.0', true);
		}

		/**
		 * Customizer Controls JS.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function static_panels_js() {
		    wp_enqueue_script('static-customize-controls', get_theme_file_uri( '/assets/custom/customize-controls.js' ), array("jquery"), '1.0', true);
		    wp_enqueue_style('static-customize-controls', get_theme_file_uri( '/assets/custom/customize-control.css' ), null );
		}
	}
}
new static_Customizer;