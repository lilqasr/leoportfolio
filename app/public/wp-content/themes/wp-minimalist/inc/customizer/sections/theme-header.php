<?php
/**
 * Header Options Section
 * 
 */
if( !function_exists( 'wp_minimalist_customizer_header_options_section' ) ) :
    /**
     * Register header options settings
     * 
     */
    function wp_minimalist_customizer_header_options_section( $wp_customize ) {
        /**
         * Content Section
         * 
         * panel - wp_minimalist_header_panel
         */
        $wp_customize->add_section( 'wp_minimalist_header_content_section', array(
            'title' => esc_html__( 'Content', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_header_panel',
            'priority'  => 10,
        ));

        /**
         * Header Search Setting Heading
         * 
         */
        $wp_customize->add_setting( 'header_search_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_search_settings_header', array(
                'label'	      => esc_html__( 'Search Bar', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_search_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Search Option
         * 
         */
        $wp_customize->add_setting( 'header_search_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'header_search_option', array(
                'label'	      => esc_html__( 'Show search bar', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_search_option'
            ))
        );
        
        /**
         * Search Placeholder
         * 
         */
        $wp_customize->add_setting( 'header_search_placeholder', array(
            'default'        => esc_html__( 'Search something here . .', 'wp-minimalist' ),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( 'header_search_placeholder', array(
            'label'    => esc_html__( 'Search Placeholder', 'wp-minimalist' ),
            'section'  => 'wp_minimalist_header_content_section',
            'type'     => 'text'
        ));

        // header search color and hover color
        $wp_customize->add_setting( 'header_search_toggle_color_group', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'header_search_toggle_color_group', array(
                'label'     => esc_html__( 'Color / Hover Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_content_section',
                'settings'  => 'header_search_toggle_color_group',
            ))
        );

        /**
         * Header sidebar toggle bar setting heading
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_bar_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_sidebar_toggle_bar_settings_header', array(
                'label'	      => esc_html__( 'Sidebar toggle', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_sidebar_toggle_bar_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header Sidebar Toggle Bar Option
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_bar_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'header_sidebar_toggle_bar_option', array(
                'label'       => esc_html__( 'Show sidebar toggle bar', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_sidebar_toggle_bar_option'
            ))
        );

        // header sidebar toggle color and hover color
        $wp_customize->add_setting( 'header_sidebar_toggle_color_group', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'header_sidebar_toggle_color_group', array(
                'label'     => esc_html__( 'Color / Hover Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_content_section',
                'settings'  => 'header_sidebar_toggle_color_group',
            ))
        );

        /**
         * Header social setting heading
         * 
         */
        $wp_customize->add_setting( 'header_social_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_social_settings_header', array(
                'label'	      => esc_html__( 'Social icons', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_social_settings_header',
                'type'        => 'section-heading',
            ))
        );

         /**
         * Header Social Icons Option
         * 
         */
        $wp_customize->add_setting( 'header_social_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'header_social_option', array(
                'label'       => esc_html__( 'Show social icons', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_social_option'
            ))
        );

        /**
         * Redirect widgets link
         * 
         */
        $wp_customize->add_setting( 'header_social_icons_redirects', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Redirect_Control( $wp_customize, 'header_social_icons_redirects', array(
                'section'     => 'wp_minimalist_header_content_section',
                'settings'    => 'header_social_icons_redirects',
                'choices'     => array(
                    'footer-column-one' => array(
                        'type'  => 'section',
                        'id'    => 'wp_minimalist_social_section',
                        'label' => esc_html__( 'Manage social icons', 'wp-minimalist' )
                    )
                )
            ))
        );

        // header social icons color and hover color
        $wp_customize->add_setting( 'header_social_color_group', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'header_social_color_group', array(
                'label'     => esc_html__( 'Color / Hover Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_content_section',
                'settings'  => 'header_social_color_group',
            ))
        );

        /**
         * Style Section
         * 
         * panel - wp_minimalist_theme_panel
         */
        $wp_customize->add_section( 'wp_minimalist_header_style_section', array(
            'title' => esc_html__( 'Style', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_header_panel',
            'priority'  => 20,
        ));

        /**
         * Header Layouts Heading
         * 
         */
        $wp_customize->add_setting( 'header_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
    

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_style_settings_header', array(
                'label' => esc_html__( 'Style', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_style_section',
                'settings'    => 'header_style_settings_header',
                'type'        => 'section-heading',
            ))
        );
        

        // header background property
        $wp_customize->add_setting( 'header_background', array(
            'default'   => json_encode(array(
                'type'  => 'solid',
                'solid' => null,
                'gradient'  => null,
                'image'     => array( 'media_id' => 0, 'media_url' => '' )
            )),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Color_Image_Group_Control( $wp_customize, 'header_background', array(
                'label'	      => esc_html__( 'Background Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_style_section',
                'settings'    => 'header_background'
            ))
        );

        /**
         * Menu Options Section
         * 
         * panel - wp_minimalist_header_panel
         */
        $wp_customize->add_section( 'wp_minimalist_header_menu_option_section', array(
            'title' => esc_html__( 'Menu Options', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_header_panel',
            'priority'  => 30,
        ));

        /**
         * Header Menu Responsive Tab
         * 
         */
        $wp_customize->add_setting( 'header_menu_responsive_tabs_settings_header', array(
            'default'           => 'desktop',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Tab_Control( $wp_customize, 'header_menu_responsive_tabs_settings_header', array(
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'header_menu_responsive_tabs_settings_header',
                'choices'   => array(
                    array(
                        'label' => esc_html__( 'Desktop', 'wp-minimalist' ),
                        'controls_hide' => array(
                            'responsive_header_menu_toggle_button_colors_settings_header',
                            'header_menu_toggle_button_color',
                            'header_menu_toggle_background_color'
                        ),
                        'controls' => array(
                            'header_menu_colors_settings_header',
                            'header_menu_font_color',
                            'header_sub_menu_colors_settings_header',
                            'header_sub_menu_background_color',
                            'header_active_menu_colors_settings_header',
                            'header_active_menu_font_color',
                            'header_menu_border_settings_header',
                            'header_menu_border_top',
                            'header_menu_typo_settings_header',
                            'header_menu_typography'
                        )
                    ),
                    array(
                        'label' => esc_html__( 'Mobile', 'wp-minimalist' ),
                        'controls' => array(
                            'responsive_header_menu_toggle_button_colors_settings_header',
                            'header_menu_toggle_button_color',
                            'header_menu_toggle_background_color'
                        ),
                        'controls_hide' => array(
                            'header_menu_colors_settings_header',
                            'header_menu_font_color',
                            'header_sub_menu_colors_settings_header',
                            'header_sub_menu_background_color',
                            'header_active_menu_colors_settings_header',
                            'header_active_menu_font_color',
                            'header_menu_border_settings_header',
                            'header_menu_border_top',
                            'header_menu_typo_settings_header',
                            'header_menu_typography'
                        )
                    )
                )
            ))
        );

        /**
         * Responsive Header Menu Toggle Button Colors Heading
         * 
         */
        $wp_customize->add_setting( 'responsive_header_menu_toggle_button_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'responsive_header_menu_toggle_button_colors_settings_header', array(
                'label'	      => esc_html__( 'Toggle Button Colors', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'responsive_header_menu_toggle_button_colors_settings_header',
                'type'        => 'section-heading',
                'active_callback'   => function() { return false; }
            ))
        );

        // Menu toggle button background color
        $wp_customize->add_setting( 'header_menu_toggle_button_color', array(
            'default'       => '#000000',
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Picker_Control( $wp_customize, 'header_menu_toggle_button_color', array(
                'label'     => esc_html__( 'Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_menu_option_section',
                'settings'  => 'header_menu_toggle_button_color',
                'active_callback'   => function() { return false; }
            ))
        );

        // Menu toggle button background color
        $wp_customize->add_setting( 'header_menu_toggle_background_color', array(
            'default'       => '#ffffff',
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Picker_Control( $wp_customize, 'header_menu_toggle_background_color', array(
                'label'     => esc_html__( 'Background Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_menu_option_section',
                'settings'  => 'header_menu_toggle_background_color',
                'active_callback'   => function() { return false; }
            ))
        );

        /**
         * Header Menu Colors Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_menu_colors_settings_header', array(
                'label'	      => esc_html__( 'Colors', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'header_menu_colors_settings_header'
            ))
        );

        // header menu font color and hover color
        $wp_customize->add_setting( 'header_menu_font_color', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'header_menu_font_color', array(
                'label'     => esc_html__( 'Color / Hover Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_menu_option_section',
                'settings'  => 'header_menu_font_color',
            ))
        );

        /**
         * Header Sub Menu Colors Heading
         * 
         */
        $wp_customize->add_setting( 'header_sub_menu_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_sub_menu_colors_settings_header', array(
                'label'	      => esc_html__( 'Sub Menu Colors', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'header_sub_menu_colors_settings_header',
                'type'        => 'section-heading'
            ))
        );


        // header menu font color and hover color
        $wp_customize->add_setting( 'header_sub_menu_background_color', array(
            'default'   => array( 'color'   => null, 'hover'   => null ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Group_Picker_Control( $wp_customize, 'header_sub_menu_background_color', array(
                'label'     => esc_html__( 'Background - Color / Hover', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_menu_option_section',
                'settings'  => 'header_sub_menu_background_color',
            ))
        );
        
        /**
         * Header Active Menu Colors Heading
         * 
         */
        $wp_customize->add_setting( 'header_active_menu_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_active_menu_colors_settings_header', array(
                'label'	      => esc_html__( 'Active Menu Colors', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'header_active_menu_colors_settings_header'
            ))
        );
        
        // Header active menu color
        $wp_customize->add_setting( 'header_active_menu_font_color', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Color_Picker_Control( $wp_customize, 'header_active_menu_font_color', array(
                'label'     => esc_html__( 'Color', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_menu_option_section',
                'settings'  => 'header_active_menu_font_color'
            ))
        );

        /**
         * Header Menu Borders Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_menu_border_settings_header', array(
                'label'	      => esc_html__( 'Borders', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'header_menu_border_settings_header',
                'type'        => 'section-heading'
            ))
        );

        // header menu border top settings
        $wp_customize->add_setting( 'header_menu_border_top', array(
            'default'   => array( 'type'=> 'solid', 'color'=> '#ddd', 'width'=> 1, 'radius'=> 0 ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Border_Box_Control( $wp_customize, 'header_menu_border_top', array(
                'label'     => esc_html__( 'Border Top', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_header_menu_option_section',
                'settings'  => 'header_menu_border_top'
            ))
        );
        
        /**
         * Header Menu Typography Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_typo_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'header_menu_typo_settings_header', array(
                'label'	      => esc_html__( 'Typography ', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_header_menu_option_section',
                'settings'    => 'header_menu_typo_settings_header'
            ))
        );

        // Add the `header text` typography settings.
        $wp_customize->add_setting( 'header_menu_font_family', array( 'default' => 'Montserrat',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'header_menu_font_weight', array( 'default' => '600',    'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'header_menu_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key') );
        $wp_customize->add_setting( 'header_menu_font_size',   array( 'default' => '14',     'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'header_menu_line_height', array( 'default' => '15',     'sanitize_callback' => 'absint' ) );

        // Add the `menu` typography control.
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Typography_Control( $wp_customize, 'header_menu_typography',
                array(
                    'label' => __( 'Typography', 'wp-minimalist' ),
                    'section'     => 'wp_minimalist_header_menu_option_section',
                    'initial'     => true,
                    'settings'    => array(
                        'family'      => 'header_menu_font_family',
                        'weight'      => 'header_menu_font_weight',
                        'style'       => 'header_menu_font_style',
                        'size'        => 'header_menu_font_size',
                        'line_height' => 'header_menu_line_height'
                    )
                )
            )
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_header_options_section', 10 );
endif;