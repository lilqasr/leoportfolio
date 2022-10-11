<?php
/**
 * Footer Three Column Panel
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( !function_exists( 'wp_minimalist_customizer_footer_three_column_panel' ) ) :
    /**
     * Register footer three columns section settings
     * 
     */
    function wp_minimalist_customizer_footer_three_column_panel( $wp_customize ) {
        /**
         * Bottom Three Column Section
         * 
         * panel - wp_minimalist_frontpage_sections_panel
         */
        $wp_customize->add_section( 'footer_three_column_section', array(
            'title' => esc_html__( 'Footer Three Column', 'wp-minimalist' ),
            'priority'  => 50
        ));
        
        /**
         * Column One Heading Settings
         * 
         */
        $wp_customize->add_setting( 'footer_column_one_header_settings', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_column_one_header_settings', array(
                'label'	      => esc_html__( 'Column One Section', 'wp-minimalist' ),
                'section'     => 'footer_three_column_section',
                'settings'    => 'footer_column_one_header_settings'
            ))
        );

        /**
         * Column one count
         * 
         */
        $wp_customize->add_setting( 'footer_column_one_count', array(
            'default'        => 3,
            'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control( 'footer_column_one_count', array(
            'label'    => esc_html__( 'Posts Count', 'wp-minimalist' ),
            'section'  => 'footer_three_column_section',		
            'type'     => 'number',
            'input_attrs'   => array(
                'min'   => 1,
                'step'  => 1,
                'max'   => 3
            )
        ));

        /**
         * Category select
         * 
         */
        $wp_customize->add_setting( 'footer_column_one_category', array(
            'default' => '',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_column_one_category', array(
            'label' => esc_html__( 'Post category', 'wp-minimalist' ),
            'type' => 'select',
            'section' => 'footer_three_column_section',
            'choices' => wp_minimalist_get_select_categories_array()
        ));

        /**
         * Column Two Heading Settings
         * 
         */
        $wp_customize->add_setting( 'footer_column_two_header_settings', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_column_two_header_settings', array(
                'label'	      => esc_html__( 'Column Two Section', 'wp-minimalist' ),
                'section'     => 'footer_three_column_section',
                'settings'    => 'footer_column_two_header_settings'
            ))
        );

        /**
         * Column two count
         * 
         */
        $wp_customize->add_setting( 'footer_column_two_count', array(
            'default'        => 3,
            'sanitize_callback' => 'absint',
            'input_attrs'   => array(
                'min'   => 1,
                'step'  => 1,
                'max'   => 3
            )
        ));

        $wp_customize->add_control( 'footer_column_two_count', array(
            'label'    => esc_html__( 'Posts Count', 'wp-minimalist' ),
            'section'  => 'footer_three_column_section',		
            'type'     => 'number',
            'input_attrs'   => array(
                'min'   => 1,
                'step'  => 1,
                'max'   => 3
            )
        ));

        /**
         * Category select
         * 
         */
        $wp_customize->add_setting( 'footer_column_two_category', array(
            'default' => '',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_column_two_category', array(
            'label' => esc_html__( 'Post category', 'wp-minimalist' ),
            'type' => 'select',
            'section' => 'footer_three_column_section',
            'choices' => wp_minimalist_get_select_categories_array()
        ));

        /**
         * Column Three Heading Settings
         * 
         */
        $wp_customize->add_setting( 'footer_column_three_header_settings', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_column_three_header_settings', array(
                'label'	      => esc_html__( 'Column Three Section', 'wp-minimalist' ),
                'section'     => 'footer_three_column_section',
                'settings'    => 'footer_column_three_header_settings'
            ))
        );

        /**
         * Column three count
         * 
         */
        $wp_customize->add_setting( 'footer_column_three_count', array(
            'default'        => 3,
            'sanitize_callback' => 'absint',
            'input_attrs'   => array(
                'min'   => 1,
                'step'  => 1,
                'max'   => 3
            )
        ));

        $wp_customize->add_control( 'footer_column_three_count', array(
            'label'    => esc_html__( 'Posts Count', 'wp-minimalist' ),
            'section'  => 'footer_three_column_section',		
            'type'     => 'number',
            'input_attrs'   => array(
                'min'   => 1,
                'step'  => 1,
                'max'   => 3
            )
        ));

        /**
         * Category select
         * 
         */
        $wp_customize->add_setting( 'footer_column_three_category', array(
            'default' => '',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_column_three_category', array(
            'label' => esc_html__( 'Post category', 'wp-minimalist' ),
            'type' => 'select',
            'section' => 'footer_three_column_section',
            'choices' => wp_minimalist_get_select_categories_array()
        ));
        
        /**
         * Bottom Three Column Style Heading Settings
         * 
         */
        $wp_customize->add_setting( 'footer_three_column_style_header_settings', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'footer_three_column_style_header_settings', array(
                'label'	      => esc_html__( 'Style', 'wp-minimalist' ),
                'section'     => 'footer_three_column_section',
                'settings'    => 'footer_three_column_style_header_settings',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Section width
         * 
         */
        $wp_customize->add_setting( 'footer_three_column_width', array(
            'default' => 'boxed-width',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_three_column_width', array(
            'label' => esc_html__( 'Section Width', 'wp-minimalist' ),
            'type' => 'select',
            'section' => 'footer_three_column_section',
            'choices' => array(
                'full-width' => __( 'Full Width', 'wp-minimalist' ),
                'boxed-width' => __( 'Boxed Width', 'wp-minimalist' )
            ),
        ));

        /**
         * Section Visible option
         * 
         */
        $wp_customize->add_setting( 'footer_three_column_option', array(
            'default' => 'all',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_three_column_option', array(
            'label' => esc_html__( 'Show section', 'wp-minimalist' ),
            'type' => 'select',
            'section' => 'footer_three_column_section',
            'choices' => array(
                'frontpage' => __( 'Show only on frontpage', 'wp-minimalist' ),
                'all'       => __( 'Show on frontpage and innerpages', 'wp-minimalist' ),
                'innerpages' => __( 'Show only on innerpages', 'wp-minimalist' ),
                'hide'      => __( 'Hide on all pages', 'wp-minimalist' )
            ),
        ));
        
        /**
         * Footer Three column Padding Settings
         * 
         */
        $wp_customize->add_setting( 'footer_three_column_padding', array( 
            'default' => array( 'desktop'   => array( 'top'=>'50px', 'right'	=> '50px', 'bottom'	=> '50px', 'left'	=> '50px' ), 'tablet'   => array( 'top'=>'50px', 'right'	=> '50px', 'bottom'	=> '50px', 'left'	=> '50px' ), 'smartphone'   => array( 'top'=>'50px', 'right'	=> '50px', 'bottom'	=> '50px', 'left'	=> '50px' ) ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Responsive_Box_Control( $wp_customize, 'footer_three_column_padding', array(
                'label'       => esc_html__( 'Padding', 'wp-minimalist' ),
                'section'     => 'footer_three_column_section',
                'settings'    => 'footer_three_column_padding'
            ))
        );

        // footer three column color and hover color
        $wp_customize->add_setting( 'footer_three_column_font_color', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'footer_three_column_font_color', array(
                'label'     => esc_html__( 'Color  / Hover Color', 'wp-minimalist' ),
                'section'   => 'footer_three_column_section',
                'settings'  => 'footer_three_column_font_color',
            ))
        );

        // footer three column background
        $wp_customize->add_setting( 'footer_three_column_background_color', array( 
            'default' => array( 'type' => 'solid', 'solid'=> null, 'gradient' => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Advanced_Color_Group_Control( $wp_customize, 'footer_three_column_background_color', array(
                'label' => esc_html__( 'Background', 'wp-minimalist' ),
                'section'   => 'footer_three_column_section',
                'settings'  => 'footer_three_column_background_color',
            ))
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_footer_three_column_panel', 50 );
endif;