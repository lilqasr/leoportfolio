<?php
/**
 * Products Panel
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( !function_exists( 'wp_minimalist_customizer_products_panel' ) ) :
    /**
     * Register products section settings
     * 
     */
    function wp_minimalist_customizer_products_panel( $wp_customize ) {
        /**
         * Products section
         * 
         * @since 1.0.0
         */
        $wp_customize->add_section( 'wp_minimalist_products_section', array(
            'title' => esc_html__( 'Latest Products', 'wp-minimalist' ),
            'priority'  => 35
        ));

        /**
         * Products layout setting heading
         */
        $wp_customize->add_setting( 'products_layout_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'products_layout_settings_header', array(
                'label'	      => esc_html__( 'Layouts Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_products_section',
                'settings'    => 'products_layout_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Products option
         */
        $wp_customize->add_setting( 'products_option', array(
            'default'   => false,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));

        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Toggle_Control( $wp_customize, 'products_option', array(
                'label'	      => esc_html__( 'Show products section', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_products_section',
                'settings'    => 'products_option'
            ))
        );

        // theme documentation info box
        $wp_customize->add_setting( 'site_woocommerce_info', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Info_Box_Control( $wp_customize, 'site_woocommerce_info', array(
                'label'	      => esc_html__( 'Plugin Required', 'wp-minimalist' ),
                'description' => esc_html__( 'You require Woocommerce plugin to display this section. After installing and activating woocommerce add products and start cusmtomizing the below options.', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_products_section',
                'settings'    => 'site_woocommerce_info',
                'choices' => array(
                    array(
                        'label' => esc_html__( 'View Woocommerce', 'wp-minimalist' ),
                        'url'   => esc_url( '//wordpress.org/plugins/woocommerce/' )
                    )
                )
            ))
        );

        /**
         * Products content setting heading
         * 
         */
        $wp_customize->add_setting( 'products_content_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Section_Heading_Control( $wp_customize, 'products_content_settings_header', array(
                'label'	      => esc_html__( 'Content Setting', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_products_section',
                'settings'    => 'products_content_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Section title
         * 
         */
        $wp_customize->add_setting( 'products_section_title', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( 'products_section_title', array(
            'label'    => esc_html__( 'Section title', 'wp-minimalist' ),
            'section'  => 'wp_minimalist_products_section',		
            'type'     => 'text'
        ));

        /**
         * Featured Links content type
         * 
         */
        $wp_customize->add_setting( 'products_content_type', array(
            'default' => 'latest',
            'sanitize_callback' => 'wp_minimalist_sanitize_select'
        ));
        
        $wp_customize->add_control( 'products_content_type', array(
            'type'      => 'select',
            'section'   => 'wp_minimalist_products_section',
            'label'     => esc_html__( 'Product Type', 'wp-minimalist' ),
            'choices'   => array(
                'latest'    => esc_html__( 'Latest', 'wp-minimalist' ),
                'featured'  => esc_html__( 'Featured', 'wp-minimalist' )
            ),
        ));

        /**
         * Products categories
         * 
         */
        $wp_customize->add_setting( 'products_categories', array(
            'default' => '[]',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Multicheckbox_Control( $wp_customize, 'products_categories', array(
                'label'     => esc_html__( 'Products Categories', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_products_section',
                'settings'  => 'products_categories',
                'choices'   => wp_minimalist_get_multicheckbox_product_categories_array()
            ))
        );

        /**
         * Products Count
         * 
         */
        $wp_customize->add_setting( 'products_count', array(
            'default' => 3,
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Range_Control( $wp_customize, 'products_count', array(
                'label'	      => esc_html__( 'Number of products to display', 'wp-minimalist' ),
                'section'     => 'wp_minimalist_products_section',
                'settings'    => 'products_count',
                'input_attrs' => array(
                    'min'   => 1,
                    'max'   => 3,
                    'step'  => 1,
                    'reset' => true
                )
            ))
        );

        /**
         * Products rating option
         * 
         */
        $wp_customize->add_setting( 'products_rating_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'products_rating_option', array(
                'label' => esc_html__( 'Show ratings', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_products_section',
                'settings'  => 'products_rating_option'
            ))
        );

        /**
         * Products price option
         * 
         */
        $wp_customize->add_setting( 'products_price_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'products_price_option', array(
                'label' => esc_html__( 'Show price', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_products_section',
                'settings'  => 'products_price_option'
            ))
        );

        /**
         * Products add to cart option
         * 
         */
        $wp_customize->add_setting( 'products_cart_option', array(
            'default'   => true,
            'sanitize_callback' => 'wp_minimalist_sanitize_toggle_control'
        ));
    
        $wp_customize->add_control( 
            new Wp_Minimalist_WP_Checkbox_Control( $wp_customize, 'products_cart_option', array(
                'label' => esc_html__( 'Show add to cart', 'wp-minimalist' ),
                'section'   => 'wp_minimalist_products_section',
                'settings'  => 'products_cart_option'
            ))
        );
    }
    add_action( 'customize_register', 'wp_minimalist_customizer_products_panel', 10 );
endif;