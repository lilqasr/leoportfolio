<?php
/**
 * Single Post Panel
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( !function_exists( 'wp_minimalist_customizer_single_post_panel' ) ) :
    /**
     * Register single post section settings
     * 
     */
    function wp_minimalist_customizer_single_post_panel( $wp_customize ) {
        /**
         * Single Post section
         * 
         * @since 1.0.0
         */
        $wp_customize->add_section( 'wp_minimalist_blog_single_post_section', array(
            'title' => esc_html__( 'Single post', 'wp-minimalist' ),
            'priority'  => 50
        ));

        /**
         * Single general content settings
         * 
         */
        $wp_customize->add_setting( 'single_general_content_setting_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'single_general_content_setting_header', array(
                'label'       => esc_html__( 'General Content', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_general_content_setting_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Single Posted on Date Option
         * 
         */
        $wp_customize->add_setting( 'single_post_date_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'single_post_date_option', array(
                'label'	      => esc_html__( 'Show/Hide post date', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_post_date_option'
            ))
        );
        
        /**
         * Single Category Option
         * 
         */
        $wp_customize->add_setting( 'single_post_categories_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'single_post_categories_option', array(
                'label'	      => esc_html__( 'Show/Hide post categories', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_post_categories_option'
            ))
        );

        /**
         * Single Comments Number Option
         * 
         */
        $wp_customize->add_setting( 'single_post_comments_num_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'single_post_comments_num_option', array(
                'label'	      => esc_html__( 'Show/Hide post comments number', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_post_comments_num_option'
            ))
        );

        /**
         * Single Tag Option
         * 
         */
        $wp_customize->add_setting( 'single_post_tags_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'single_post_tags_option', array(
                'label'	      => esc_html__( 'Show/Hide post tags', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_post_tags_option'
            ))
        );

        /**
         * Single Author Box settings
         * 
         */
        $wp_customize->add_setting( 'single_author_box_setting_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'single_author_box_setting_header', array(
                'label'       => esc_html__( 'Author Box', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_author_box_setting_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Single Author Box Option
         * 
         */
        $wp_customize->add_setting( 'single_post_author_box_option', array(
            'default'         => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'single_post_author_box_option', array(
                'label'	      => esc_html__( 'Show/Hide author box', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_post_author_box_option'
            ))
        );

        /**
         * Single Related Posts settings
         * 
         */
        $wp_customize->add_setting( 'single_related_posts_setting_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'single_related_posts_setting_header', array(
                'label'       => esc_html__( 'Related Posts', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_blog_single_post_section',
                'settings'    => 'single_related_posts_setting_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Related Posts Section Title
         * 
         */
        $wp_customize->add_setting( 'single_post_related_posts_title', array(
            'default'   => esc_html__( 'Related Posts', 'wp-minimalist' ),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( 'single_post_related_posts_title', array(
            'label'    => esc_html__( 'Related posts title', 'wp-minimalist' ),
            'section'  => 'wp_minimalist_blog_single_post_section',		
            'type'     => 'text'
        ));
        
        /**
         * Single Related Posts Count
         * 
         */
        $wp_customize->add_setting( 'single_post_related_posts_count', array(
            'default'        => 3,
            'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control( 'single_post_related_posts_count', array(
            'label'    => esc_html__( 'Posts Count -', 'wp-minimalist' ),
            'section'  => 'wp_minimalist_blog_single_post_section',		
            'type'     => 'number',
            'input_attrs'   => array(
                'min'   => 1,
                'step'  => 1,
                'max'   => 3
            )
        ));

    }
    add_action( 'customize_register', 'wp_minimalist_customizer_single_post_panel', 10 );
endif;