<?php
/**
 * Main Banner Panel
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( !function_exists( 'wp_minimalist_customizer_main_banner_panel' ) ) :
    /**
     * Register main banner section settings
     * 
     */
    function wp_minimalist_customizer_main_banner_panel( $wp_customize ) {
        /**
         * Main Banner section
         * 
         */
        $wp_customize->add_section( 'wp_minimalist_main_banner_section', array(
            'title' => esc_html__( 'Main Banner Slider', 'wp-minimalist' ),
            'priority'  => 30
        ));

        /**
         * Main banner content setting heading
         * 
         */
        $wp_customize->add_setting( 'main_banner_layout_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'main_banner_layout_settings_header', array(
                'label'	      => esc_html__( 'Layouts Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_layout_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Main Banner option
         * 
         */
        $wp_customize->add_setting( 'main_banner_option', array(
            'default'   => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'main_banner_option', array(
                'label'	      => esc_html__( 'Show main banner', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_option'
            ))
        );

        /**
         * Main Banner slider display on
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_display_on', array(
            'default' => 'front-blog',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'main_banner_slider_display_on', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_main_banner_section',
            'label'     => esc_html__( 'Orderby', 'wp-minimalist' ),
            'choices'   => array(
                'front' => esc_html__( 'Frontpage', 'wp-minimalist' ),
                'blog'  => esc_html__( 'Posts page', 'wp-minimalist' ),
                'front-blog'    => esc_html__( 'Frontpage and posts page', 'wp-minimalist' )
            )
        ));

        /**
         * Main banner slider setting heading
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'main_banner_slider_settings_header', array(
                'label'	      => esc_html__( 'Slider Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Main Banner slider orderby
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_source', array(
            'default' => 'posts',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'main_banner_slider_source', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_main_banner_section',
            'label'     => esc_html__( 'Banner Source', 'wp-minimalist' ),
            'choices'   => array(
                'posts'  => esc_html__( 'Posts', 'wp-minimalist' ),
                'custom' => esc_html__( 'Custom', 'wp-minimalist' )
            )
        ));

        // social icons repeater field
        $wp_customize->add_setting( 'main_banner_slider_custom', array(
            'default'   => json_encode( array(
                array(
                    'banner_image'  => '',
                    'banner_title'  => esc_html__('banner one','wp-minimalist'),
                    'banner_url'    => '',
                    'item_option'   => 'show'
                ),
                array(
                    'banner_image'  => '',
                    'banner_title'  => esc_html__('banner two','wp-minimalist'),
                    'banner_url'    => '',
                    'item_option'   => 'show'
                ),
                array(
                    'banner_image'  => '',
                    'banner_title'  => esc_html__('banner three','wp-minimalist'),
                    'banner_url'    => '',
                    'item_option'   => 'show'
                )
                ,
                array(
                    'banner_image'  => '',
                    'banner_title'  => esc_html__('banner four','wp-minimalist'),
                    'banner_url'    => '',
                    'item_option'   => 'show'
                )
            )),
            'sanitize_callback' => 'wp_minimalist_sanitize_repeater_control'
        ));
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Custom_Repeater( $wp_customize, 'main_banner_slider_custom', array(
                'label'         => esc_html__( 'Custom content', 'wp-minimalist' ),
                'description'   => esc_html__( 'Hold item and drag  vertically to re-order the icons', 'wp-minimalist' ),
                'section'       => 'wp_minimalist_main_banner_section',
                'settings'      => 'main_banner_slider_custom',
                'row_label'     => esc_html__( 'Banner', 'wp-minimalist' ),
                'add_new_label' => esc_html__( 'Add new Banner', 'wp-minimalist' ),
                'fields'        => array(
                    'banner_image'   => array(
                        'type'          => 'image',
                        'label'         => esc_html__( 'Image', 'wp-minimalist' ),
                        'description'   => esc_html__( 'Upload image', 'wp-minimalist' )
                    ),
                    'banner_title'   => array(
                        'type'          => 'text',
                        'label'         => esc_html__( 'Title', 'wp-minimalist' ),
                    ),
                    'banner_url'  => array(
                        'type'          => 'url',
                        'label'         => esc_html__( 'URL', 'wp-minimalist' ),
                    ),
                    'item_option'             => 'show'
                ),
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'custom' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner custom title option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_custom_title_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_custom_title_option', array(
                'label' => esc_html__( 'Show banner title', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_main_banner_section',
                'settings'  => 'main_banner_slider_custom_title_option',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'custom' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner slider orderby
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_order_by', array(
            'default' => 'date-desc',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'main_banner_slider_order_by', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_main_banner_section',
            'label'     => esc_html__( 'Orderby', 'wp-minimalist' ),
            'choices'   => array(
                'date-desc' => esc_html__( 'Newest - Oldest', 'wp-minimalist' ),
                'date-asc' => esc_html__( 'Oldest - Newest', 'wp-minimalist' ),
                'title-asc' => esc_html__( 'A - Z', 'wp-minimalist' ),
                'title-desc' => esc_html__( 'Z - A', 'wp-minimalist' )
            ),
            'active_callback'   => function( $setting ) {
                if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                    return true;
                }
                return false;
            }
        ));

        /**
         * Main Banner slider categories
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_categories', array(
            'default' => '[]',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Multicheckbox_Control( $wp_customize, 'main_banner_slider_categories', array(
                'label'     => esc_html__( 'Posts Categories', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_main_banner_section',
                'settings'  => 'main_banner_slider_categories',
                'choices'   => wp_minimalist_get_multicheckbox_categories_array(),
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner slider number of posts
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_numbers', array(
            'default' => 3,
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Range_Control( $wp_customize, 'main_banner_slider_numbers', array(
                'label'	      => esc_html__( 'Number of posts to display', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_numbers',
                'input_attrs' => array(
                    'min'   => 1,
                    'max'   => 4,
                    'step'  => 1,
                    'reset' => true
                ),
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner slider post title option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_post_title_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_post_title_option', array(
                'label' => esc_html__( 'Show post title', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_main_banner_section',
                'settings'  => 'main_banner_slider_post_title_option',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner slider categories option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_categories_option', array(
            'default'   => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_categories_option', array(
                'label' => esc_html__( 'Show post categories', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_main_banner_section',
                'settings'  => 'main_banner_slider_categories_option',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner slider date option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_date_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_date_option', array(
                'label'	      => esc_html__( 'Show post published date', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_date_option',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main Banner slider comments option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_comments_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_comments_option', array(
                'label' => esc_html__( 'Show comments number', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_main_banner_section',
                'settings'  => 'main_banner_slider_comments_option',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_slider_source' )->value() === 'posts' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Main banner slider attributes setting heading
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_attr_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'main_banner_slider_attr_settings_header', array(
                'label'	      => esc_html__( 'Slider Attributes', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_attr_settings_header',
                'type'        => 'section-heading',
            ))
        );


        /**
         * Main Banner slider arrows option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_arrows', array(
            'default' => true,
            'sanitize_callback' => 'rest_sanitize_boolean'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_arrows', array(
                'label'	      => esc_html__( 'Show slider controller arrows', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_arrows'
            ))
        );

        /**
         * Main Banner slider pager option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_dots', array(
            'default' => false,
            'sanitize_callback' => 'rest_sanitize_boolean'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_dots', array(
                'label'	      => esc_html__( 'Show slider pager dots', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_dots'
            ))
        );

        /**
         * Main Banner slider loop option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_loop', array(
            'default' => true,
            'sanitize_callback' => 'rest_sanitize_boolean'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_loop', array(
                'label'	      => esc_html__( 'Enable slider loop', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_loop'
            ))
        );

        /**
         * Main Banner slider fade option
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_fade', array(
            'default' => true,
            'sanitize_callback' => 'rest_sanitize_boolean'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'main_banner_slider_fade', array(
                'label'	      => esc_html__( 'Enable fade animation', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_fade'
            ))
        );

        /**
         * Main Banner slider speed
         * 
         */
        $wp_customize->add_setting( 'main_banner_slider_speed', array(
            'default' => 300,
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Range_Control( $wp_customize, 'main_banner_slider_speed', array(
                'label'	      => esc_html__( 'Slider speed', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_slider_speed',
                'input_attrs' => array(
                    'min'   => 200,
                    'max'   => 10000,
                    'step'  => 100,
                    'reset' => true
                )
            ))
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_main_banner_panel', 10 );
endif;