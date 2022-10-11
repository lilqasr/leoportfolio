<?php
/**
 * Featured Links Panel
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( !function_exists( 'wp_minimalist_customizer_featured_links_panel' ) ) :
    /**
     * Register featured links section settings
     * 
     */
    function wp_minimalist_customizer_featured_links_panel( $wp_customize ) {
        /**
         * Featured Links section
         * 
         * @since 1.0.0
         */
        $wp_customize->add_section( 'wp_minimalist_featured_links_section', array(
            'title' => esc_html__( 'Featured Links', 'wp-minimalist' ),
            'priority'  => 30
        ));

        /**
         * Featured Links layout setting heading
         */
        $wp_customize->add_setting( 'featured_links_layout_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'featured_links_layout_settings_header', array(
                'label'	      => esc_html__( 'Layouts Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_featured_links_section',
                'settings'    => 'featured_links_layout_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Featured Links option
         */
        $wp_customize->add_setting( 'featured_links_option', array(
            'default'   => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'featured_links_option', array(
                'label'	      => esc_html__( 'Show featured links', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_featured_links_section',
                'settings'    => 'featured_links_option'
            ))
        );

        /**
         * Featured Links display on
         * 
         */
        $wp_customize->add_setting( 'featured_links_display_on', array(
            'default' => 'front-blog',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'featured_links_display_on', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_featured_links_section',
            'label'     => esc_html__( 'Orderby', 'wp-minimalist' ),
            'choices'   => array(
                'front' => esc_html__( 'Frontpage', 'wp-minimalist' ),
                'blog'  => esc_html__( 'Posts page', 'wp-minimalist' ),
                'front-blog'    => esc_html__( 'Frontpage and posts page', 'wp-minimalist' )
            )
        ));

        /**
         * Featured Links content setting heading
         * 
         */
        $wp_customize->add_setting( 'featured_links_content_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'featured_links_content_settings_header', array(
                'label'	      => esc_html__( 'Content Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_featured_links_section',
                'settings'    => 'featured_links_content_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Section title
         * 
         */
        $wp_customize->add_setting( 'featured_links_title', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( 'featured_links_title', array(
            'label'    => esc_html__( 'Section Title', 'wp-minimalist' ),
            'section'  => 'wp_minimalist_featured_links_section',		
            'type'     => 'text'
        ));

        /**
         * Featured Links content type
         * 
         */
        $wp_customize->add_setting( 'featured_links_content_type', array(
            'default' => 'categories',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'featured_links_content_type', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_featured_links_section',
            'label'     => esc_html__( 'Content Type', 'wp-minimalist' ),
            'choices'   => array(
                'categories'=> esc_html__( 'Post Categories', 'wp-minimalist' ),
                'custom'    => esc_html__( 'Custom Links', 'wp-minimalist' )
            ),
        ));

        /**
         * Featured Links categories
         * 
         */
        $wp_customize->add_setting( 'featured_links_categories', array(
            'default' => '[]',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Multicheckbox_Control( $wp_customize, 'featured_links_categories', array(
                'label'     => esc_html__( 'Posts Categories', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_featured_links_section',
                'settings'  => 'featured_links_categories',
                'choices'   => wp_minimalist_get_multicheckbox_categories_array(),
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'featured_links_content_type' )->value() === 'categories' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Featured Links Items
         * 
         */
        $wp_customize->add_setting( 'featured_links_items', array(
            'default'   => json_encode(array(
                array(
                    'item_image'    => '',
                    'item_title'    => esc_html__( 'Featured Link', 'wp-minimalist' ),
                    'item_url'  => '',
                    'item_option'   => 'show'
                ),
                array(
                    'item_image'    => '',
                    'item_title'    => esc_html__( 'Featured Link', 'wp-minimalist' ),
                    'item_url'  => '',
                    'item_option'   => 'show'
                ),
                array(
                    'item_image'    => '',
                    'item_title'    => esc_html__( 'Featured Link', 'wp-minimalist' ),
                    'item_url'  => '',
                    'item_option'   => 'show'
                )
            )),
            'sanitize_callback' => 'wp_minimalist_sanitize_repeater_control'
        ));

        $wp_customize->add_control(
            new Wp_Minimalist_WP_Custom_Repeater( $wp_customize, 'featured_links_items', array(
                'label'         => esc_html__( 'Featured links', 'wp-minimalist' ),
                'description'   => esc_html__( 'Hold item and drag vertically to re-order the icons', 'wp-minimalist' ),
                'section'       => 'wp_minimalist_featured_links_section',
                'settings'      => 'featured_links_items',
                'row_label'     => esc_html__( 'Featured Item', 'wp-minimalist' ),
                'add_new_label' => esc_html__( 'Add new item', 'wp-minimalist' ),
                'fields'        => array(
                    'item_image'   => array(
                        'type'          => 'image',
                        'label'         => esc_html__( 'Image', 'wp-minimalist' ),
                        'description'   => esc_html__( 'Choose from the library or upload an image.', 'wp-minimalist' ),
                        'default'       => esc_attr( 'fab fa-instagram' )

                    ),
                    'item_title'  => array(
                        'type'      => 'text',
                        'label'     => esc_html__( 'Title', 'wp-minimalist' ),
                        'default'   => ''
                    ),
                    'item_url'  => array(
                        'type'      => 'url',
                        'label'     => esc_html__( 'URL for featured item', 'wp-minimalist' ),
                        'default'   => ''
                    ),
                    'item_option'             => 'show'
                ),
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'featured_links_content_type' )->value() === 'custom' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Featured Links title option
         * 
         */
        $wp_customize->add_setting( 'featured_links_title_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'featured_links_title_option', array(
                'label' => esc_html__( 'Show links title', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_featured_links_section',
                'settings'  => 'featured_links_title_option',
                'type'      => 'simple-toggle-button'
            ))
        );

        /**
         * Categories count option
         * 
         */
        $wp_customize->add_setting( 'featured_links_categories_count_option', array(
            'default'   => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'featured_links_categories_count_option', array(
                'label' => esc_html__( 'Show categories count', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_featured_links_section',
                'settings'  => 'featured_links_categories_count_option',
                'type'      => 'simple-toggle-button',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'featured_links_content_type' )->value() === 'categories' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        /**
         * Featured Links carousel setting heading
         */
        $wp_customize->add_setting( 'featured_links_carousel_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'featured_links_carousel_settings_header', array(
                'label'	      => esc_html__( 'Carousel Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_featured_links_section',
                'settings'    => 'featured_links_carousel_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Featured Links column option
         */
        $wp_customize->add_setting( 'featured_links_carousel_column', array(
            'default'   => 'three',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control(
            new Wp_Minimalist_WP_Tab_Group_Control( $wp_customize, 'featured_links_carousel_column', array(
                'label'     => esc_html__( 'Column control', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_featured_links_section',
                'settings'  => 'featured_links_carousel_column',
                'choices'   => array(
                    'two'   => array(
                        'label' => esc_html__( 'Two', 'wp-minimalist' )
                    ),
                    'three' => array(
                        'label' => esc_html__( 'Three', 'wp-minimalist' )
                    )
                )
            ))
        );

    }
    add_action( 'customize_register', 'wp_minimalist_customizer_featured_links_panel', 10 );
endif;