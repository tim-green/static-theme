<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'static' ) );

if( ! class_exists( 'static_Static' ) ) :
class static_Static {

    /**
     * Allow HTML tag from escaping HTML 
     * 
     * @return void
     * @since v1.0
     */
    public static function html_allow() {
        return array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'del' => array(),
            'span' => array(),
            'em' => array(),
            'strong' => array(),
            'h1' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h2' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h3' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h4' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h5' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h6' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'div' => array(
                'class' => array(),
                'id' => array(),
            ),
            'p' => array(
                'class' => array(),
                'id' => array(),
            ),
        );
    }

    /**
     * @since v1.0
     */
    public static function total_grid() {
        return array(
            '1' => esc_html__( '1 Grid', 'static' ),
            '2' => esc_html__( '2 Grid', 'static' ),
            '3' => esc_html__( '3 Grid', 'static' ),
            '4' => esc_html__( '4 Grid', 'static' ),
            '5' => esc_html__( '5 Grid', 'static' ),
            '6' => esc_html__( '6 Grid', 'static' ),
            '7' => esc_html__( '7 Grid', 'static' ),
            '8' => esc_html__( '8 Grid', 'static' ),
            '9' => esc_html__( '9 Grid', 'static' ),
            '10' => esc_html__( '10 Grid', 'static' ),
            '11' => esc_html__( '11 Grid', 'static' ),
            '12' => esc_html__( '12 Grid', 'static' ),
        );
    }

    /**
     * @since v1.0
     */
    public static function total_items() {
        return array(
            '2' => esc_html__( 'Two', 'static' ),
            '3' => esc_html__( 'Three', 'static' ),
            '4' => esc_html__( 'Four', 'static' ),
            '5' => esc_html__( 'Five', 'static' ),
            '6' => esc_html__( 'Six', 'static' ),
            '7' => esc_html__( 'Seven', 'static' ),
        );
    }

}

// Removing this line is like not having a functions.php file
new static_Static;

endif;