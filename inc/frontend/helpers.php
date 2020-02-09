<?php
/**
 * Theme Helpers
 *
 * @package static
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(! class_exists( 'static_Helpers' ) ) {
    /**
     * The static Helpers
     */
    class static_Helpers {
        
        public function __construct() {
            //Print Theme Colors
            $this->static_color();

            //Print Heading Colors
            $this->static_main_headings_color();

            //Header Color Background and styles
            $this->static_backgound_image_cover_bg();

            //Spacing Elements
            $this->static_spaing_elements( );            

            //Page Elements
            $this->static_page_elements( );
        }
