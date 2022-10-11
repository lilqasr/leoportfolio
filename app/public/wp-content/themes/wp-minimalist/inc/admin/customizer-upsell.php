<?php
/**
 * Theme Upsell
 * 
 * @package WP Minimalist
 * @since 1.0.7
 */
if( !function_exists( 'wp_minimalist_customizer_upsells' ) ) :
    /**
     * Register blog archive section settings
     * 
     */
    function wp_minimalist_customizer_upsells( $wp_customize ) {
        // social icons upsells
        $wp_customize->add_setting( 'social_icons_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'social_icons_info', array(
                'label'	      => esc_html__( 'Unlimited social icons', 'wp-minimalist' ),
                'description' => esc_html__( 'For unlimited social icons and premium support.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_social_section',
                'settings'    => 'social_icons_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );

        // main_banner_info
        $wp_customize->add_setting( 'main_banner_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'main_banner_info', array(
                'label'	      => esc_html__( 'More control over', 'wp-minimalist' ),
                'description' => esc_html__( 'For unlimited custom banner items and more control over banner section.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_main_banner_section',
                'settings'    => 'main_banner_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );

        // featured_links_info
        $wp_customize->add_setting( 'featured_links_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'featured_links_info', array(
                'label'	      => esc_html__( 'More control over', 'wp-minimalist' ),
                'description' => esc_html__( 'For unlimited custom featured links, four column and more control over featured section.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_featured_links_section',
                'settings'    => 'featured_links_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );

        // blog_archive_info
        $wp_customize->add_setting( 'blog_archive_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'blog_archive_info', array(
                'label'	      => esc_html__( 'More layouts and controls', 'wp-minimalist' ),
                'description' => esc_html__( 'For more layouts masonry, three column grid and more. Related posts controls fields', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_archive_section',
                'settings'    => 'blog_archive_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );

        // products_info
        $wp_customize->add_setting( 'products_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'products_info', array(
                'label'	      => esc_html__( 'Background styles and no limit over control', 'wp-minimalist' ),
                'description' => esc_html__( 'For more layouts, styles, color controls.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_products_section',
                'settings'    => 'products_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );

        // blog_single_post_info
        $wp_customize->add_setting( 'blog_single_post_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'blog_single_post_info', array(
                'label'	      => esc_html__( 'More layouts and controls', 'wp-minimalist' ),
                'description' => esc_html__( 'For more layouts and related posts controls fields', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'blog_single_post_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );
        
        // footer_info
        $wp_customize->add_setting( 'footer_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'footer_info', array(
                'label'	      => esc_html__( 'Colors, styles and premium support', 'wp-minimalist' ),
                'description' => esc_html__( 'Gradient, solid and background image fields', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_footer_style_section',
                'settings'    => 'footer_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );

        // bottom_footer_info
        $wp_customize->add_setting( 'bottom_footer_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'bottom_footer_info', array(
                'label'	      => esc_html__( 'Copyright Editor, Colors, styles and premium support', 'wp-minimalist' ),
                'description' => esc_html__( 'Gradient, solid and background image fields', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_bottom_footer_content_section',
                'settings'    => 'bottom_footer_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Pro', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_upsells', 10 );
endif;