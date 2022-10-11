<?php
/**
 * Gloabl Options Section
 *
 */
if( !function_exists( 'wp_minimalist_customizer_global_options_section' ) ) :
    /**
     * Register global options settings
     *
     */
    function wp_minimalist_customizer_global_options_section( $wp_customize ) {
        /**
         * Miscellaneous
         * 
         * panel - misc_section
         */
        $wp_customize->add_section( 'misc_section', array(
            'title' => esc_html__( 'Miscs', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_global_options_panel',
            'priority'  => 5
        ));

        // Lazyload Option
        $wp_customize->add_setting( 'lazy_load_option', array(
            'default'           => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'lazy_load_option', array(
                'label'	      => esc_html__( 'Enable lazy load images', 'wp-minimalist' ),
                'description' => esc_html__( 'Helps to load your site faster. Enabling this option will use the wordpress default lazyload functionality. This will only load the images, videos and audios when its on windows viewport.', 'wp-minimalist' ),
                'section'     => 'misc_section',
                'settings'    => 'lazy_load_option'
            ))
        );

        /**
         * Sticky header section
         *
         * panel - wp_minimalist_global_options_panel
         */
        $wp_customize->add_section( 'wp_minimalist_global_sticky_header_section', array(
          'title' => esc_html__( 'Sticky Header', 'wp-minimalist' ),
          'panel' => 'wp_minimalist_global_options_panel',
          'priority'  => 5,
        ));

        /**
         * Sticky header Option
         *
         */
        $wp_customize->add_setting( 'sticky_header_option', array(
          'default'         => false,
          'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'sticky_header_option', array(
                'label'	      => esc_html__( 'Enable sticky header', 'wp-minimalist' ),
                'description' => esc_html__( 'Header section will be fixed through out the whole website.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_global_sticky_header_section',
                'settings'    => 'sticky_header_option'
            ))
        );

        /**
         * Scroll to top show or hide on mobile and tablet option
         *
         */
        $wp_customize->add_setting( 'sticky_header_responsive_display', array(
            'default'           => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'sticky_header_responsive_display', array(
                'label'       => esc_html__( 'Enable sticky on mobile and tablet', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_global_sticky_header_section',
                'settings'    => 'sticky_header_responsive_display',
                'active_callback'   => function( $setting ) {
                    return $setting->manager->get_setting( 'sticky_header_option' )->value();
                }
            ))
        );

        /**
         * Social Section
         *
         * panel - wp_minimalist_global_options_panel
         */
        $wp_customize->add_section( 'wp_minimalist_social_section', array(
            'title' => esc_html__( 'Social', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_global_options_panel',
            'priority'  => 10,
        ));

        /**
         * Global Social Setting Heading
         *
         */
        $wp_customize->add_setting( 'global_social_settings_header', array(
          'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'global_social_settings_header', array(
                'label'	      => esc_html__( 'Social Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_section',
                'settings'    => 'global_social_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Social icons target attribute value
         * 
         */
        $wp_customize->add_setting( 'social_icons_target', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_select',
            'default'   => '_blank',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control( 'social_icons_target', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_social_section',
            'label'     => esc_html__( 'Social Icon Link Open in', 'wp-minimalist' ),
            'description' => esc_html__( 'Sets the target attribute according to the value.', 'wp-minimalist' ),
            'choices'   => array(
                '_blank' => esc_html__( 'Open link in new tab', 'wp-minimalist' ),
                '_self'  => esc_html__( 'Open link in same tab', 'wp-minimalist' )
            )
        ));

        // social icons repeater field
        $wp_customize->add_setting( 'social_icons', array(
            'default'   => json_encode( array(
                array(
                    'icon_class'    => esc_attr( 'fab fa-linkedin-in' ),
                    'icon_url'  => '',
                    'item_option'   => 'show'
                ),
                array(
                    'icon_class'    => esc_attr( 'fab fa-twitter' ),
                    'icon_url'  => '',
                    'item_option'   => 'show'
                ),
                array(
                    'icon_class'    => esc_attr( 'fab fa-vimeo-v' ),
                    'icon_url'  => '',
                    'item_option'   => 'show'
                ),
                array(
                    'icon_class'    => esc_attr( 'fab fa-instagram' ),
                    'icon_url'  => '',
                    'item_option'   => 'show'
                )
            )),
            'sanitize_callback' => 'wp_minimalist_sanitize_repeater_control'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Custom_Repeater( $wp_customize, 'social_icons', array(
                'label'         => esc_html__( 'Social Icons', 'wp-minimalist' ),
                'description'   => esc_html__( 'Hold item and drag  vertically to re-order the icons', 'wp-minimalist' ),
                'section'       => 'wp_minimalist_social_section',
                'settings'      => 'social_icons',
                'row_label'     => esc_html__( 'Social icon', 'wp-minimalist' ),
                'add_new_label' => esc_html__( 'Add new icon', 'wp-minimalist' ),
                'fields'        => array(
                    'icon_class'   => array(
                        'type'          => 'fontawesome-icon-picker',
                        'label'         => esc_html__( 'Social icon', 'wp-minimalist' ),
                        'description'   => esc_html__( 'Select from dropdown', 'wp-minimalist' )
                    ),
                    'icon_url'  => array(
                        'type'          => 'url',
                        'label'         => esc_html__( 'URL for icon', 'wp-minimalist' ),
                    ),
                    'item_option'             => 'show'
                ),
            ))
        );
        
        /**
         * Social Share Section
         *
         * panel - wp_minimalist_global_options_panel
         */
        $wp_customize->add_section( 'wp_minimalist_social_share_section', array(
            'title' => esc_html__( 'Social Share', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_global_options_panel',
            'priority'  => 15,
        ));

        /**
         * Global Social Setting Heading
         *
         */
        $wp_customize->add_setting( 'global_social_share_settings_header', array(
          'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'global_social_share_settings_header', array(
                'label'       => esc_html__( 'Social Share Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'global_social_share_settings_header',
                'type'        => 'section-heading',
            ))
        );

        // Social share twitter option
        $wp_customize->add_setting( 'social_share_twitter_option', array(
            'default'           => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'social_share_twitter_option', array(
                'label'       => esc_html__( 'Show twitter share', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'social_share_twitter_option'
            ))
        );

        // Social share facebook option
        $wp_customize->add_setting( 'social_share_facebook_option', array(
            'default'           => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'social_share_facebook_option', array(
                'label'       => esc_html__( 'Show facebook share', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'social_share_facebook_option'
            ))
        );

        // Social share pinterest option
        $wp_customize->add_setting( 'social_share_pinterest_option', array(
            'default'           => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'social_share_pinterest_option', array(
                'label'       => esc_html__( 'Show pinterest share', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'social_share_pinterest_option'
            ))
        );

        // Social share linkedin option
        $wp_customize->add_setting( 'social_share_linkedin_option', array(
            'default'           => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'social_share_linkedin_option', array(
                'label'       => esc_html__( 'Show linkedin share', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'social_share_linkedin_option'
            ))
        );

        /**
         * Archive Social Share Setting Heading
         *
         */
        $wp_customize->add_setting( 'archive_social_share_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'archive_social_share_settings_header', array(
                'label'       => esc_html__( 'Blog / Archive Page', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'archive_social_share_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Archive social share option
         *
         */
        $wp_customize->add_setting( 'archive_social_share_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'archive_social_share_option', array(
                'label'       => esc_html__( 'Show social share on archive', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'archive_social_share_option'
            ))
        );

        // Archive social share position
        $wp_customize->add_setting( 'archive_social_share_position', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_select',
            'default'   => 'after_content',
        ));
        
        $wp_customize->add_control( 'archive_social_share_position', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_social_share_section',
            'label'     => esc_html__( 'Display social share html on', 'wp-minimalist' ),
            'choices'   => array(
                'before_content' => __( 'Before Content', 'wp-minimalist' ),
                'after_content'  => __( 'After Content', 'wp-minimalist' )
            )
        ));

        /**
         * Post Social Share Setting Heading
         *
         */
        $wp_customize->add_setting( 'single_social_share_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'single_social_share_settings_header', array(
                'label'       => esc_html__( 'Single Post Page', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'single_social_share_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Single social share option
         *
         */
        $wp_customize->add_setting( 'single_social_share_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'single_social_share_option', array(
                'label'       => esc_html__( 'Show social share on single', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_share_section',
                'settings'    => 'single_social_share_option'
            ))
        );

        // Single social share position
        $wp_customize->add_setting( 'single_social_share_position', array(
            'sanitize_callback' => 'wp_minimalist_sanitize_select',
            'default'   => 'after_content',
        ));
        
        $wp_customize->add_control( 'single_social_share_position', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_social_share_section',
            'label'     => esc_html__( 'Display social share html on', 'wp-minimalist' ),
            'choices'   => array(
                'before_content' => __( 'Before Content', 'wp-minimalist' ),
                'after_content'  => __( 'After Content', 'wp-minimalist' )
            )
        ));






        /**
         * Global Container Section
         *
         * panel - wp_minimalist_global_options_panel
         */
        $wp_customize->add_section( 'wp_minimalist_global_container_section', array(
          'title' => esc_html__( 'Container', 'wp-minimalist' ),
          'panel' => 'wp_minimalist_global_options_panel',
          'priority'  => 30
        ));

        /**
         * Scroll To Top Style Setting Heading
         *
         */
        $wp_customize->add_setting( 'global_sttop_style_settings_header', array(
          'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'global_sttop_style_settings_header', array(
                'label'	      => esc_html__( 'Style ', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_scroll_top_section',
                'settings'    => 'global_sttop_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Container Width Setting
         *
         */
        $wp_customize->add_setting( 'wp_minimalist_global_container_width', array(
          'sanitize_callback' => 'wp_minimalist_sanitize_number_range',
          'default'           => 1360
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Range_Control( $wp_customize, 'wp_minimalist_global_container_width', array(
                'label'	      => esc_html__( 'Container width (px)', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_global_container_section',
                'settings'    => 'wp_minimalist_global_container_width',
                'unit'        => 'px',
                'input_attrs' => array(
                  'max'         => 1175,
                  'min'         => 780,
                  'step'        => 1,
                  'reset' => true
                )
            ))
        );

        /**
         * Sidebar Width Setting
         *
         */
        $wp_customize->add_setting( 'wp_minimalist_global_container_sidebar_width', array(
          'sanitize_callback' => 'wp_minimalist_sanitize_number_range',
          'default'           => 25
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Range_Control( $wp_customize, 'wp_minimalist_global_container_sidebar_width', array(
                'label'	      => esc_html__( 'Sidebar width (%)', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_global_container_section',
                'settings'    => 'wp_minimalist_global_container_sidebar_width',
                'unit'        => '%',
                'input_attrs' => array(
                  'max'         => 50,
                  'min'         => 20,
                  'step'        => 1,
                  'reset' => true
                )
            ))
        );

        /**
         * Sticky sidebar Section
         *
         * panel - wp_minimalist_global_options_panel
         */
        $wp_customize->add_section( 'wp_minimalist_global_sticky_sidebar_section', array(
            'title' => esc_html__( 'Sticky Sidebar', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_global_options_panel',
            'priority'  => 100,
        ));

        /**
         * Sticky sidebar Option
         *
         */
        $wp_customize->add_setting( 'sticky_sidebars_option', array(
            'default'         => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'sticky_sidebars_option', array(
                'label'	      => esc_html__( 'Enable sticky sidebars', 'wp-minimalist' ),
                'description' => esc_html__( 'This will avoid users to see blank space when the length of content is longer than sidebars. This functionality is disabled in responsive devices as the sidebar appears below the content.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_global_sticky_sidebar_section',
                'settings'    => 'sticky_sidebars_option'
            ))
        );

        /**
         * Scroll To Top Section
         *
         * panel - wp_minimalist_global_options_panel
         */
        $wp_customize->add_section( 'wp_minimalist_scroll_top_section', array(
            'title' => esc_html__( 'Scroll To Top', 'wp-minimalist' ),
            'panel' => 'wp_minimalist_global_options_panel',
            'priority'  => 100,
        ));

        /**
         * Scroll To Top Content Setting Heading
         *
         */
        $wp_customize->add_setting( 'global_sttop_content_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'global_sttop_content_settings_header', array(
                'label'	      => esc_html__( 'Content ', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_scroll_top_section',
                'settings'    => 'global_sttop_content_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Scroll To Top Option
         *
         */
        $wp_customize->add_setting( 'scroll_to_top_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'scroll_to_top_option', array(
                'label'	      => esc_html__( 'Show scroll to top', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_scroll_top_section',
                'settings'    => 'scroll_to_top_option'
            ))
        );

        /**
         * Scroll to top show or hide on mobile and tablet option
         *
         */
        $wp_customize->add_setting( 'scroll_to_top_responsive_display', array(
            'default'           => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'scroll_to_top_responsive_display', array(
                'label'       => esc_html__( 'Show button on mobile and tablet', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_scroll_top_section',
                'settings'    => 'scroll_to_top_responsive_display',
                'active_callback'   => function( $setting ) {
                    return $setting->manager->get_setting( 'scroll_to_top_option' )->value();
                }
            ))
        );

        /**
         * Scroll To Top Align
         *
         */
        $wp_customize->add_setting( 'scroll_to_top_align',
            array(
            'default'           => 'align--right',
            'sanitize_callback' => 'sanitize_text_field',
            )
        );

        // Add the layout control.
        $wp_customize->add_control( new Wp_Minimalist_WP_Tab_Group_Control(
            $wp_customize,
            'scroll_to_top_align',
                array(
                'label'    => esc_html__( 'Button Align', 'wp-minimalist' ),
                'section'  => 'wp_minimalist_scroll_top_section',
                'choices'  => array(
                    'align--left' => array(
                        'label'  => esc_html__( 'Left', 'wp-minimalist' )
                    ),
                    'align--center' => array(
                        'label'  => esc_html__( 'Center', 'wp-minimalist' )
                    ),
                    'align--right' => array(
                        'label'  => esc_html__( 'Right', 'wp-minimalist' )
                    )
                )
            )
        ));

        /**
         * Scroll To Top Style Setting Heading
         *
         */
        $wp_customize->add_setting( 'global_sttop_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'global_sttop_style_settings_header', array(
                'label'	      => esc_html__( 'Style ', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_scroll_top_section',
                'settings'    => 'global_sttop_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Three column Padding Settings
         * 
         */
        $wp_customize->add_setting( 'scroll_to_top_padding', array( 
            'default' => array( 'desktop'   => array( 'top'=>'10px', 'right'	=> '10px', 'bottom'	=> '10px', 'left'	=> '10px' ), 'tablet'   => array( 'top'=>'10px', 'right'	=> '10px', 'bottom'	=> '10px', 'left'	=> '10px' ), 'smartphone'   => array( 'top'=>'5px', 'right'	=> '5px', 'bottom'	=> '5px', 'left'	=> '5px' ) ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Responsive_Box_Control( $wp_customize, 'scroll_to_top_padding', array(
                'label'       => esc_html__( 'Padding', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_scroll_top_section',
                'settings'    => 'scroll_to_top_padding'
            ))
        );

        // scroll to top border settings
        $wp_customize->add_setting( 'scroll_to_top_border', array(
            'default'   => array( 'type'=> 'solid', 'color'=> '#000000', 'width'=> 1, 'radius'=> 0 ),
            'sanitize_callback' => 'wp_minimalist_sanitize_array',
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Border_Box_Control( $wp_customize, 'scroll_to_top_border', array(
                'label'     => esc_html__( 'Border', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_scroll_top_section',
                'settings'  => 'scroll_to_top_border',
            ))
        );
  }
  add_action( 'customize_register', 'wp_minimalist_customizer_global_options_section', 10 );
endif;