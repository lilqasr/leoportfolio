<?php
/**
 * Site Identity Section
 * 
 */
if( !function_exists( 'wp_minimalist_customizer_site_identity_section' ) ) :
    /**
     * Register site identity settings
     * 
     */
    function wp_minimalist_customizer_site_identity_section( $wp_customize ) {
        /**
         * Site Title Section
         * 
         * panel - wp_minimalist_site_identity_panel
         */
        $wp_customize->add_section( 'wp_minimalist_site_title_section', array(
            'title' => esc_html__( 'Site Title & Tagline', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_site_identity_panel',
            'priority'  => 30,
        ));
        $wp_customize->get_control( 'blogname' )->section = 'wp_minimalist_site_title_section';
        $wp_customize->get_control( 'display_header_text' )->section = 'wp_minimalist_site_title_section';
        $wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display site title', 'wp-minimalist' );
        $wp_customize->get_control( 'blogdescription' )->section = 'wp_minimalist_site_title_section';

        /**
         * Container Width Setting
         * @since 1.0.6
         */
        $wp_customize->add_setting( 'wp_minimalist_site_logo_width', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_number_range',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Range_Control( $wp_customize, 'wp_minimalist_site_logo_width', array(
                    'label'	      => esc_html__( 'Logo Width (px)', 'wp-minimalist' ),
                    'section'     => 'title_tagline',
                    'settings'    => 'wp_minimalist_site_logo_width',
                    'unit'        => 'px',
                    'input_attrs' => array(
                    'max'         => 600,
                    'min'         => 0,
                    'step'        => 1,
                    'reset' => true
                )
            ))
        );

        /**
         * Blog Description Option
         * 
         */
        $wp_customize->add_setting( 'blogdescription_option', array(
            'default'        => true,
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control( 'blogdescription_option', array(
            'label'    => esc_html__( 'Display site description', 'wp-minimalist' ),
            'section'  => 'wp_minimalist_site_title_section',
            'type'     => 'checkbox',
            'priority' => 50
        ));

        /**
         * Site Title Heading
         * 
         */
        $wp_customize->add_setting( 'site_title_style_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'site_title_style_header', array(
                'label'	      => esc_html__( 'Style', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_site_title_section',
                'settings'    => 'site_title_style_header',
                'type'        => 'section-heading',
                'priority'    => 50
            ))
        );

        $wp_customize->get_control( 'header_textcolor' )->section = 'wp_minimalist_site_title_section';
        $wp_customize->get_control( 'header_textcolor' )->priority = 60;
        $wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'wp-minimalist' );

        /**
         * Header Text Hover Color
         * 
         */
        $wp_customize->add_setting( 'header_hover_textcolor', array(
            'default' => '#717171',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ) );
    
        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'header_hover_textcolor', array(
                'label'      => esc_html__( 'Site Title Hover Color', 'wp-minimalist' ),
                'section'    => 'wp_minimalist_site_title_section',
                'settings'   => 'header_hover_textcolor',
                'priority'    => 70
            ))
        );

        /**
         * Site Title Typography Heading
         * 
         */
        $wp_customize->add_setting( 'site_title_typo_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'site_title_typo_settings_header', array(
                'label'	      => esc_html__( 'Typography ', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_site_title_section',
                'settings'    => 'site_title_typo_settings_header',
                'type'        => 'section-heading',
                'priority'    => 80
            ))
        );
        
        // Add the `header text` typography settings.
        $wp_customize->add_setting( 'site_title_font_family', array( 'default' => 'Montserrat',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'site_title_font_weight', array( 'default' => '600',    'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'site_title_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key') );
        $wp_customize->add_setting( 'site_title_font_size',   array( 'default' => 32,     'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'site_title_line_height', array( 'default' => 1,     'sanitize_callback' => 'absint' ) );

        // Add the `<p>` typography control.
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Typography_Control( $wp_customize, 'site_title_typography',
                array(
                    'label' => __( 'Typography', 'wp-minimalist' ),
                    'section'     => 'wp_minimalist_site_title_section',
                    'initial'     => true,
                    'settings'    => array(
                        'family'      => 'site_title_font_family',
                        'weight'      => 'site_title_font_weight',
                        'style'       => 'site_title_font_style',
                        'size'        => 'site_title_font_size',
                        'line_height' => 'site_title_line_height'
                    ),
                    'priority'  => 100
                )
            )
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_site_identity_section', 10 );
endif;