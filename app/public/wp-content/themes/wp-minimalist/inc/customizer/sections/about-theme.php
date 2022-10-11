<?php
/**
 * About Theme Panel
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( !function_exists( 'wp_minimalist_customizer_about_theme_panel' ) ) :
    /**
     * Register blog archive section settings
     * 
     */
    function wp_minimalist_customizer_about_theme_panel( $wp_customize ) {
        /**
         * About theme section
         * 
         * @since 1.0.0
         */
        $wp_customize->add_section( 'wp_minimalist_about_section', array(
            'title' => esc_html__( 'About Theme', 'wp-minimalist' ),
            'priority'  => 1
        ));
        
        // theme documentation info box
        $wp_customize->add_setting( 'site_documentation_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'site_documentation_info', array(
                'label'	      => esc_html__( 'Theme Documentation', 'wp-minimalist' ),
                'description' => esc_html__( 'We have well prepared documentation which includes overall instructions and recommendations that are required in this theme.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_about_section',
                'settings'    => 'site_documentation_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Documentation', 'wp-minimalist' ),
                        'url'   => esc_url( '//doc.blazethemes.com/wp-minimalist' )
                    )
                )
            ))
        );

        // theme support form info box
        $wp_customize->add_setting( 'site_support_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'site_support_info', array(
                'label'	      => esc_html__( 'Theme Support', 'wp-minimalist' ),
                'description' => esc_html__( 'We provide 24/7 support regarding any theme issue. Our support team will help you to solve any kind of issue. Feel free to contact us.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_about_section',
                'settings'    => 'site_support_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'Support Form', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/support' )
                    )
                )
            ))
        );

        // theme review info box
        $wp_customize->add_setting( 'theme_review_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'theme_review_info', array(
                'label'	      => esc_html__( 'Theme Review', 'wp-minimalist' ),
                'description' => esc_html__( 'We hope you are enjoying using wp minimalist. We look forward to hear from you which will definetely help us to improve in future.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_about_section',
                'settings'    => 'theme_review_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'Leave a review', 'wp-minimalist' ),
                        'url'   => esc_url( '//wordpress.org/support/theme/wp-minimalist/reviews/?filter=5' )
                    )
                )
            ))
        );

        // theme upgrade info box
        $wp_customize->add_setting( 'theme_upgrade_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'theme_upgrade_info', array(
                'label'	      => esc_html__( 'Premium upgrade', 'wp-minimalist' ),
                'description' => esc_html__( 'Looking for more control over the theme? With more features, layouts and more freedom over the theme we have released the premium version of wp minimalist.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_about_section',
                'settings'    => 'theme_upgrade_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View premium', 'wp-minimalist' ),
                        'url'   => esc_url( '//blazethemes.com/theme/wp-minimalist-pro/' )
                    )
                )
            ))
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_about_theme_panel', 10 );
endif;