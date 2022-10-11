<?php
/**
 * Footer Options Section
 * 
 */
if( !function_exists( 'wp_minimalist_customizer_footer_options_section' ) ) :
    /**
     * Register footer options settings
     * 
     */
    function wp_minimalist_customizer_footer_options_section( $wp_customize ) {
        /**
         * Content Section
         * 
         * panel - wp_minimalist_footer_panel
         */
        $wp_customize->add_section( 'wp_minimalist_footer_content_section', array(
            'title' => esc_html__( 'Content', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_footer_panel',
            'priority'  => 10,
        ));
        
        /**
         * General Social Setting Heading
         * 
         */
        $wp_customize->add_setting( 'footer_general_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_general_settings_header', array(
                'label'	      => esc_html__( 'General Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_content_section',
                'settings'    => 'footer_general_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Option
         * 
         */
        $wp_customize->add_setting( 'footer_option', array(
            'default'   => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'footer_option', array(
                'label'	      => esc_html__( 'Enable footer section', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_content_section',
                'settings'    => 'footer_option'
            ))
        );

        /**
         * Footer Widgets Redirect  Heading
         * 
         */
        $wp_customize->add_setting( 'footer_widgets_redirect_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_widgets_redirect_settings_header', array(
                'label'	      => esc_html__( 'Footer Widgets', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_content_section',
                'settings'    => 'footer_widgets_redirect_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Redirect widgets link
         * 
         */
        $wp_customize->add_setting( 'footer_widgets_redirects', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Redirect_Control( $wp_customize, 'footer_widgets_redirects', array(
                'label'	      => esc_html__( 'Widgets', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_content_section',
                'settings'    => 'footer_widgets_redirects',
                'choices'     => array(
                    'footer-column-one' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column',
                        'label' => esc_html__( 'Manage footer widget one', 'wp-minimalist' )
                    ),
                    'footer-column-two' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column-2',
                        'label' => esc_html__( 'Manage footer widget two', 'wp-minimalist' )
                    ),
                    'footer-column-three' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column-3',
                        'label' => esc_html__( 'Manage footer widget three', 'wp-minimalist' )
                    ),
                    'footer-column-four' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column-4',
                        'label' => esc_html__( 'Manage footer widget four', 'wp-minimalist' )
                    )
                )
            ))
        );

        /**
         * Style Section
         * 
         * panel - wp_minimalist_theme_panel
         */
        $wp_customize->add_section( 'wp_minimalist_footer_style_section', array(
            'title' => esc_html__( 'Style', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_footer_panel',
            'priority'  => 20,
        ));

        /**
         * Footer Layouts Heading
         * 
         */
        $wp_customize->add_setting( 'footer_layout_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_layout_settings_header', array(
                'label'	      => esc_html__( 'Footer Layouts', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_style_section',
                'settings'    => 'footer_layout_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Section width
         * 
         */
        $wp_customize->add_setting( 'footer_section_width', array(
            'default' => 'full-width',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_section_width', array(
            'label' => esc_html__( 'Footer Width', 'wp-minimalist' ),
            'type' => 'select',
            'section' => 'wp_minimalist_footer_style_section',
            'choices' => array(
                'full-width' => __( 'Full Width', 'wp-minimalist' ),
                'boxed-width' => __( 'Boxed Width', 'wp-minimalist' )
            ),
        ));

        /**
         * Footer Widget column
         * 
         */
        $wp_customize->add_setting( 'footer_widget_column',
            array(
            'default'           => 'column-two',
            'sanitize_callback' => 'sanitize_text_field',
            )
        );

        // Add the layout control.
        $wp_customize->add_control( new Wp_Minimalist_WP_Radio_Image_Control(
            $wp_customize,
            'footer_widget_column',
            array(
                'section'  => 'wp_minimalist_footer_style_section',
                'choices'  => array(
                    'column-one' => array(
                        'label' => esc_html__( 'Column One', 'wp-minimalist' ),
                        'url'   => '%s/assets/images/customizer/footer-column-one.jpg'
                    ),
                    'column-two' => array(
                        'label' => esc_html__( 'Column Two', 'wp-minimalist' ),
                        'url'   => '%s/assets/images/customizer/footer-column-two.jpg'
                    ),
                    'column-three' => array(
                        'label' => esc_html__( 'Column Three', 'wp-minimalist' ),
                        'url'   => '%s/assets/images/customizer/footer-column-three.jpg'
                    ),
                    'column-four' => array(
                        'label' => esc_html__( 'Column Four', 'wp-minimalist' ),
                        'url'   => '%s/assets/images/customizer/footer-column-four.jpg'
                    )
                )
            )
        ));
        
        /**
         * Footer Style Heading
         * 
         */
        $wp_customize->add_setting( 'footer_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_style_settings_header', array(
                'label'	      => esc_html__( 'Style Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_style_section',
                'settings'    => 'footer_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        // footer color settings
        $wp_customize->add_setting( 'footer_color', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'footer_color', array(
                'label'     => esc_html__( 'Color / Hover Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_footer_style_section',
                'settings'  => 'footer_color',
            ))
        );

        /**
         * Bottom Footer Section
         * 
         * panel - wp_minimalist_footer_panel
         */
        $wp_customize->add_section( 'wp_minimalist_bottom_footer_content_section', array(
            'title' => esc_html__( 'Bottom Footer', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_footer_panel',
            'priority'  => 50,
        ));

        /**
         * General Bottom Footer Setting Heading
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_general_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'bottom_footer_general_settings_header', array(
                'label'	      => esc_html__( 'Content Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_bottom_footer_content_section',
                'settings'    => 'bottom_footer_general_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Bottom footer site info
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_site_info', array(
            'default'    => esc_html__( 'WP Minimalist - Modern WordPress Theme. All Rights Reserved %year%.', 'wp-minimalist' ),
            'sanitize_callback' => 'wp_kses_post'
        ));
        $wp_customize->add_control( 'bottom_footer_site_info', array(
                'label'	      => esc_html__( 'Copyright Text', 'wp-minimalist' ),
                'type'  => 'textarea',
                'description' => esc_html__( 'Add %year% to retrieve current year.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_bottom_footer_content_section'
            )
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_footer_options_section', 10 );
endif;