<?php
/**
 *  static Besic Theme Settings
 *
 * @since static 1.0
 *
 * @return array static_customize_register
 *
*/
function static_customize_register( $wp_customize ) {
    //Basic Post Message Settings
    $wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'custom_logo' )->transport     = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->active_callback = '__return_false';

    // Changing for site Identity
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'static_customize_partial_blogname',
    ));
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'static_customize_partial_blogdescription',
    ));

    $wp_customize->add_setting( 'static_options[home_page_logo]' , array(
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'static_sanitize_url',
       'type'  =>  'theme_mod',
       'transport'   => 'postMessage',
    )); 

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        'static_options[home_page_logo]', array(
            'label'   => esc_html__('Home page Logo','static'),
            'section' => 'title_tagline',
            'priority' => 20,
    ) ) );    

    $wp_customize->add_setting( 'static_options[sticky_menu_logo]' , array(
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'static_sanitize_url',
       'type'  =>  'theme_mod',
       'transport'   => 'postMessage',
    )); 

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        'static_options[sticky_menu_logo]', array(
            'label'   => esc_html__('Sticky Header Logo','static'),
            'section' => 'title_tagline',
            'priority' => 20,
    ) ) );

    if( class_exists('static_Customizer_Dimensions_Control') ) {
        /**
         * Blog Padding
         */
        $wp_customize->add_setting( 'static_options[logo_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number',
            'default'               => 20,
        ) );
        $wp_customize->add_setting( 'static_options[logo_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number',
            'default'               => 20,
        ) );

        $wp_customize->add_setting( 'static_options[logo_tablet_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 20,
        ) );
        $wp_customize->add_setting( 'static_options[logo_tablet_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 20,
        ) );

        $wp_customize->add_setting( 'static_options[logo_mobile_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 20,
        ) );
        $wp_customize->add_setting( 'static_options[logo_mobile_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 20,
        ) );

        $wp_customize->add_control( new static_Customizer_Dimensions_Control( $wp_customize, 'static_options[logo_padding]', array(
            'label'                 => esc_html__( 'Logo Padding (px)', 'static' ),
            'section'               => 'title_tagline',             
            'settings'   => array(
                'desktop_top'       => 'static_options[logo_top_padding]',
                'desktop_bottom'    => 'static_options[logo_bottom_padding]',
                'tablet_top'        => 'static_options[logo_tablet_top_padding]',
                'tablet_bottom'     => 'static_options[logo_tablet_bottom_padding]',
                'mobile_top'        => 'static_options[logo_mobile_top_padding]',
                'mobile_bottom'     => 'static_options[logo_mobile_bottom_padding]',
            ),
            'priority'              => 20,
            'input_attrs'           => array(
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
            ),
        ) ) );
    }

    $wp_customize->add_setting( 'static_options[theme_color]' , array(
       'default'   => '#7540ee',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[theme_color]', array(
           'label'    => esc_html__( 'Theme Color', 'static' ),
           'section'  => 'colors',
        ) 
    ));    

    $wp_customize->add_setting( 'static_options[menu_color]' , array(
       'default'   => '#4a4a4a',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[menu_color]', array(
           'label'    => esc_html__( 'Menu Color', 'static' ),
           'section'  => 'colors',
        ) 
    ));      

    $wp_customize->add_setting( 'static_options[dropdown_menu_bg]' , array(
       'default'   => '#232323',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[dropdown_menu_bg]', array(
           'label'    => esc_html__( 'Dropdown Menu Background', 'static' ),
           'section'  => 'colors',
        ) 
    ));    

    $wp_customize->add_setting( 'static_options[dropdown_menu_color]' , array(
       'default'   => '#f7f7f7',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[dropdown_menu_color]', array(
           'label'    => esc_html__( 'Dropdown Menu Color', 'static' ),
           'section'  => 'colors',
        ) 
    ));

    $wp_customize->add_setting( 'static_options[footer_background]' , array(
        'default'     => '#7540ee',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type'      =>  'theme_mod',
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[footer_background]', array(
           'label'    => esc_html__( 'Footer Background Color: ', 'static' ),
           'section'  => 'colors',
        ) 
    ));

    $wp_customize->add_setting( 'static_options[footer_color]' , array(
        'default'     => '#dedede',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type'      =>  'theme_mod',
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[footer_color]', array(
           'label'    => esc_html__( 'Footer Text Color: ', 'static' ),
           'section'  => 'colors',
        ) 
    ));    

    $wp_customize->add_setting( 'static_options[footer_link_color]' , array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type'      =>  'theme_mod',
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'static_options[footer_link_color]', array(
           'label'    => esc_html__( 'Footer Link Color: ', 'static' ),
           'section'  => 'colors',
        ) 
    ));

    /**
     * static WordPress Theme Header Settings
     */  
    $wp_customize->add_section( 'static_header_settings' , array(
        'title'      => esc_html__( 'Header Settings', 'static' ),
        'priority'   => 28,
    ) ); 


    if ( class_exists( 'static_Customize_Control_Radio_Image' ) ) { 
        $sidebar_choices = array(
            'header_one'    => array(
                'url'   =>  get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/header-one.png' ),
                'label' => esc_html__( 'Header One', 'static' ),
            ),
            'header_two'  => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/header-two.png' ),
                'label' => esc_html__( 'Header Two', 'static' ),
            ),
        );

        $wp_customize->add_setting( 'static_options[header_layout_dispay]' , array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_key',
            'type'      =>  'theme_mod',
            'default' => 'header_one',
        ));

        $wp_customize->add_control(
            new static_Customize_Control_Radio_Image(
                $wp_customize, 'static_options[header_layout_dispay]', array(
                    'label'    => esc_html__( 'Header Layout', 'static' ),
                    'section'  => 'static_header_settings',
                    'priority' => 10,
                    'choices'  => $sidebar_choices,
                )
            )
        );
    }


    $wp_customize->add_setting( 'static_options[header_right_settings]', array(
        'default'     => 'button',
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'static_sanitize_select',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'static_options[header_right_settings]', 
        array(
            'label'                 => esc_html__( 'Header Menu Right', 'static' ),
            'type'                  => 'select',
            'section'               => 'static_header_settings',
            'priority'              => 12, 
            'choices'               => array(
                'button' => esc_html__( 'Button', 'static' ),
                'social'  => esc_html__( 'Social URL', 'static' ),
                'none'  => esc_html__( 'None', 'static' ),
            ),
        ) 
    ) );

    $wp_customize->add_setting( 'static_options[header_right_button_title]', array(
        'sanitize_callback' => 'static_sanitize_text_or_array_field',
        'default'     => 'Hire Me',
        'transport'   => 'postMessage', 
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'static_options[header_right_button_title]', 
        array(
            'label'                 => esc_html__( 'Header Menu Button Title', 'static' ),
            'type'                  => 'text',
            'section'               => 'static_header_settings',
            'priority'              => 12,
        ) 
    ) );

    $wp_customize->add_setting( 'static_options[header_right_button_url]', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'     => '#',
        'transport'   => 'postMessage', 
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'static_options[header_right_button_url]', 
        array(
            'label'                 => esc_html__( 'Header Menu Button URL', 'static' ),
            'type'                  => 'text',
            'section'               => 'static_header_settings',
            'priority'              => 12,
        ) 
    ) );

    $wp_customize->add_setting( 'static_options[social_profile_target]', array(
        'default'     => '_blank',
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'static_options[social_profile_target]', 
        array(
            'label'                 => esc_html__( 'Social Link Target', 'static' ),
            'type'                  => 'select',
            'section'               => 'static_header_settings',
            'priority'              => 12, 
            'choices'               => array(
                '_blank' => esc_html__( 'New Window', 'static' ),
                '_self'  => esc_html__( 'Same Window', 'static' ),
            ),
        ) 
    ) );

    if ( class_exists( 'static_Customizer_Repeater_Control' ) ) { 
        $wp_customize->add_setting( 'static_options[social_url]', array(
            'sanitize_callback' => 'static_customizer_repeater_sanitize',
            'capability' => 'edit_theme_options',
            'transport'   => 'postMessage',
        )); 
    
        $wp_customize->add_control( new static_Customizer_Repeater_Control( $wp_customize, 'static_options[social_url]', array(
            'label'   => esc_html__('Social URL','static'),
            'section' => 'static_header_settings',
            'priority' => 12,
            'customizer_repeater_image_control' => true,
            'customizer_repeater_icon_control' => true,
            'customizer_repeater_link_control' => true,
        ) ) );
    }

    /**
     * static WordPress Theme General Settings
     */  
    $wp_customize->add_section( 'static_general_settings' , array(
        'title'      => esc_html__( 'General Settings', 'static' ),
        'priority'   => 28,
    ) ); 

    if ( class_exists( 'static_Toggle_Control' ) ) {
        $wp_customize->add_setting( 'static_options[preloader]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'static_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new static_Toggle_Control( $wp_customize, 
            'static_options[preloader]', 
            array(
                'label'  => esc_html__( 'Preloader:', 'static' ),
                'type'   => 'ios',
                'section'  => 'static_general_settings',
                'priority' => 10, 
                
            ) 
        ));            

        $wp_customize->add_setting( 'static_options[scroll_top_btn]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'static_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new static_Toggle_Control( $wp_customize, 
            'static_options[scroll_top_btn]', 
            array(
                'label'  => esc_html__( 'Scroll Top:', 'static' ),
                'type'   => 'ios',
                'section'  => 'static_general_settings',
                'priority' => 10, 
                
            ) 
        ));        

        $wp_customize->add_setting( 'static_options[sticky_contact_btn]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'static_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new static_Toggle_Control( $wp_customize, 
            'static_options[sticky_contact_btn]', 
            array(
                'label'  => esc_html__( 'Sticky Contact Button:', 'static' ),
                'type'   => 'ios',
                'section'  => 'static_general_settings',
                'priority' => 10, 
                
            ) 
        ));        
    }   
    $wp_customize->add_setting( 'static_options[sticky_contact_url]', array(
        'default'     => '#',
        'transport'   => 'postMessage', 
        'sanitize_callback' => 'static_sanitize_url',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'static_options[sticky_contact_url]', array(
            'label' => esc_html__( 'Contact URL:', 'static' ),
            'type' => 'text',
            'section' => 'static_general_settings',
        )
    );

     /**
     * static WordPress Theme Blog Settings
     */ 
    $wp_customize->add_section( 'static_blog_settings' , array(
        'title'      => esc_html__( 'Blog Settings', 'static' ),
        'priority'   => 90,   
    ));

    if( class_exists('static_Customizer_Dimensions_Control') ) {
        /**
         * Blog Padding
         */
        $wp_customize->add_setting( 'static_options[top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number',
            'default'               => 195,
        ) );
        $wp_customize->add_setting( 'static_options[bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number',
            'default'               => 135,
        ) );

        $wp_customize->add_setting( 'static_options[tablet_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 195,
        ) );
        $wp_customize->add_setting( 'static_options[tablet_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 135,
        ) );

        $wp_customize->add_setting( 'static_options[mobile_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 175,
        ) );
        $wp_customize->add_setting( 'static_options[mobile_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'static_sanitize_number_blank',
            'default'               => 135,
        ) );

        $wp_customize->add_control( new static_Customizer_Dimensions_Control( $wp_customize, 'static_options[blog_padding]', array(
            'label'                 => esc_html__( 'Blog Padding (px)', 'static' ),
            'section'               => 'static_blog_settings',             
            'settings'   => array(
                'desktop_top'       => 'static_options[top_padding]',
                'desktop_bottom'    => 'static_options[bottom_padding]',
                'tablet_top'        => 'static_options[tablet_top_padding]',
                'tablet_bottom'     => 'static_options[tablet_bottom_padding]',
                'mobile_top'        => 'static_options[mobile_top_padding]',
                'mobile_bottom'     => 'static_options[mobile_bottom_padding]',
            ),
            'priority'              => 10,
            'input_attrs'           => array(
                'min'   => 0,
                'max'   => 400,
                'step'  => 1,
            ),
        ) ) );
    }

    if ( class_exists( 'static_Customize_Control_Radio_Image' ) ) { 
        $sidebar_choices = array(
            'full'    => array(
                'url'   =>  get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/full-width.png' ),
                'label' => esc_html__( 'Full Width', 'static' ),
            ),
            'left'  => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/sidebar-left.png' ),
                'label' => esc_html__( 'Left Sidebar', 'static' ),
            ),
            'right' => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/sidebar-right.png' ),
                'label' => esc_html__( 'Right Sidebar', 'static' ),
            ),
        );

        $wp_customize->add_setting( 'static_options[blog_sidebar_dispay]' , array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_key',
            'type'      =>  'theme_mod',
            'default' => 'right',
        ));

        $wp_customize->add_control(
            new static_Customize_Control_Radio_Image(
                $wp_customize, 'static_options[blog_sidebar_dispay]', array(
                    'label'    => esc_html__( 'Blog Sidebar Layout', 'static' ),
                    'section'  => 'static_blog_settings',
                    'priority' => 10,
                    'choices'  => $sidebar_choices,
                )
            )
        );
    }

    $wp_customize->add_setting( 'static_options[excerpt_length]' , array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'type'      =>  'theme_mod',
        'default' => 25,
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 'static_options[excerpt_length]', array(
        'label' => esc_html__( 'Excerpt Length: ', 'static' ),
        'description' => esc_html__( 'How many words want to show per page?', 'static' ),
        'section' => 'static_blog_settings',
        'type'        => 'number',
        'priority' => 20,
        'input_attrs' => array(
            'min'  => 1,
            'max'   => 100,
            'step' => 1,
        ),
    ));


    /**
     * End static WordPress Theme Footer Control Panel
     */
    $wp_customize->add_section( 'static_footer' , array(
        'title'      => esc_html__( 'Footer Settings', 'static' ),
        'priority'   => 100,   
    ));

    if ( class_exists( 'static_Toggle_Control' ) ) {
        $wp_customize->add_setting( 'static_options[mail_chimp_visivility]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'static_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new static_Toggle_Control( $wp_customize, 
            'static_options[mail_chimp_visivility]', 
            array(
                'label'  => esc_html__( 'Enable Mailchimp:', 'static' ),
                'description' => esc_html__('Note: This option available for Blog page, Blog Single Page, Service single page, Portfolio single and Portfolio archive page.', 'static'),
                'type'   => 'ios',
                'section'  => 'static_footer',
                'priority' => 10, 
                
            ) 
        ));
    }

    if ( class_exists( 'static_Customizer_Repeater_Control' ) ) { 
        $wp_customize->add_setting( 'static_options[footer_social_url]', array(
            'sanitize_callback' => 'static_customizer_repeater_sanitize',
            'capability' => 'edit_theme_options',
            'transport'   => 'postMessage',
        )); 
    
        $wp_customize->add_control( new static_Customizer_Repeater_Control( $wp_customize, 'static_options[footer_social_url]', array(
            'label'   => esc_html__('Social URL','static'),
            'section' => 'static_footer',
            'priority' => 10,
            'customizer_repeater_title_control' => true,
            'customizer_repeater_link_control' => true,
        ) ) );
    }


    $wp_customize->add_setting(
        'static_options[footer_copyright_info]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'static_sanitize_advance_html',
            'type'      =>  'theme_mod',
            'transport' => 'postMessage',
            'default'   => 'Copyright &copy; 2018 static All rights Reserved. Developed By - <a href="#">SoftHopper</a>',
        )
    );

    $wp_customize->add_control(
        'static_options[footer_copyright_info]', array(
            'label' => esc_html__( 'Footer Copyright Text:', 'static' ),
            'type' => 'text',
            'priority' => 10,
            'section' => 'static_footer',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'static_options[footer_copyright_info]', array(
        'selector' => '.copyright-text', 
    ) );

    /**
     * End static WordPress Theme Footer Control Panel
     */    
}
add_action( 'customize_register', 'static_customize_register' );