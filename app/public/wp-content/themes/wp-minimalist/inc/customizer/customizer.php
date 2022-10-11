<?php
/**
 * WP Minimalist Theme Customizer
 *
 * @package WP Minimalist
 */
function wp_minimalist_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_section( 'header_image' )->priority		= 10;
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'title_tagline' )->panel = 'wp_minimalist_site_identity_panel';
	$wp_customize->get_section( 'title_tagline' )->title = esc_html__( 'Logo & Site Icon', 'wp-minimalist' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wp_minimalist_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wp_minimalist_customize_partial_blogdescription',
			)
		);
	}
	require get_template_directory() . '/inc/customizer/custom-controls/repeater/repeater.php';
	require get_template_directory() . '/inc/customizer/roots.php';
	require get_template_directory() . '/inc/customizer/custom-controls/radio-image/radio-image.php';
	require get_template_directory() . '/inc/customizer/custom-controls/section-heading/section-heading.php';
	require get_template_directory() . '/inc/customizer/custom-controls/typography/typography.php';
	require get_template_directory() . '/inc/customizer/custom-controls/redirect-control/redirect-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/tab-control/tab-control.php';

	// register control type
	$wp_customize->register_control_type( 'Wp_Minimalist_WP_Radio_Image_Control' );
	$wp_customize->register_control_type( 'Wp_Minimalist_WP_Typography_Control' );

	/**
	 * Register "Site Identity Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'wp_minimalist_site_identity_panel', array(
		'title' => esc_html__( 'Site Identity', 'wp-minimalist' ),
		'priority' => 5
	));

	/**
	 * Register "Gloabl Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'wp_minimalist_global_options_panel', array(
		'title' => esc_html__( 'Global Options', 'wp-minimalist' ),
		'priority' => 10
	));

	/**
	 * Register "Theme Header" panel
	 * 
	 */
	$wp_customize->add_panel( 'wp_minimalist_header_panel', array(
		'title' => esc_html__( 'Theme Header', 'wp-minimalist' ),
		'priority' => 20
	));

	/**
	 * Register "Frontpage Sections" panel
	 * 
	 */
	$wp_customize->add_panel( 'wp_minimalist_frontpage_sections_panel', array(
		'title' => esc_html__( 'Frontpage Sections', 'wp-minimalist' ),
		'priority' => 30
	));

	/**
	 * Register "Innerpages Section" panel
	 * 
	 */
	$wp_customize->add_panel( 'wp_minimalist_innerpages_settings_panel', array(
		'title' => esc_html__( 'Innerpages', 'wp-minimalist' ),
		'priority' => 40
	));

	/**
	 * Register "Theme Footer" panel
	 * 
	 */
	$wp_customize->add_panel( 'wp_minimalist_footer_panel', array(
		'title' => esc_html__( 'Theme Footer', 'wp-minimalist' ),
		'priority' => 80
	));

	/**
	 * Theme Color
	 * 
	 */
	$wp_customize->add_setting( 'wp_minimalist_theme_color', array(
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'wp_minimalist_theme_color', array(
			'label'      => esc_html__( 'Theme Color', 'wp-minimalist' ),
			'section'    => 'colors',
			'settings'   => 'wp_minimalist_theme_color'
		))
	);

	/**
	 * Theme Hover Color
	 * 
	 */
	$wp_customize->add_setting( 'wp_minimalist_theme_hover_color', array(
		'default' => '#717171',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'wp_minimalist_theme_hover_color', array(
			'label'      => esc_html__( 'Theme Hover Color', 'wp-minimalist' ),
			'section'    => 'colors',
			'settings'   => 'wp_minimalist_theme_hover_color'
		))
	);

	/**
	 * Slider Background Color
	 * 
	 */
	$wp_customize->add_setting( 'wp_minimalist_slider_bk_color', array(
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'wp_minimalist_slider_bk_color', array(
			'label'      => esc_html__( 'Slider Bk Color', 'wp-minimalist' ),
			'section'    => 'colors',
			'settings'   => 'wp_minimalist_slider_bk_color'
		))
	);
}
add_action( 'customize_register', 'wp_minimalist_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wp_minimalist_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wp_minimalist_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_minimalist_customize_preview_js() {
	wp_enqueue_script( 'wp-minimalist-customizer', get_template_directory_uri() . '/inc/customizer/assets/customizer-preview.js', array( 'customize-preview' ), WP_MINIMALIST_VERSION, true );
}
add_action( 'customize_preview_init', 'wp_minimalist_customize_preview_js' );

/**
 * Binds JS handlers to extend Theme Customizer (section inside section).
 */
function wp_minimalist_customize_controls_scripts() {
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/lib/fontawesome/css/all.min.css', array(), '5.15.3', 'all' );
    wp_enqueue_style( 'select-2', get_template_directory_uri() . '/assets/lib/select2/css/select2.min.css', array(), '4.1.0', 'all' );
    wp_enqueue_style( 'wp-minimalist-customizer-control', get_template_directory_uri() . '/inc/customizer/assets/customizer-controls.css', array(), WP_MINIMALIST_VERSION, 'all' );
    wp_enqueue_script( 'select-2', get_template_directory_uri() . '/assets/lib/select2/js/select2.min.js', array(), '4.1.0', true );
    wp_enqueue_script( 'wp-minimalist-customizer-control-build', get_template_directory_uri() . '/inc/customizer/assets/customizer-controls.min.js', array( 'react', 'wp-blocks', 'wp-editor', 'wp-element', 'wp-i18n', 'wp-polyfill', 'wp-components' ), WP_MINIMALIST_VERSION, true );
    wp_set_script_translations( 'wp-minimalist-customizer-control-build', 'wp-minimalist' );
}
add_action( 'customize_controls_enqueue_scripts', 'wp_minimalist_customize_controls_scripts' );

// include files
require get_template_directory() . '/inc/customizer/sanitize.php';
require get_template_directory() . '/inc/customizer/sections/about-theme.php';
require get_template_directory() . '/inc/customizer/sections/site-identity.php';
require get_template_directory() . '/inc/customizer/sections/global-options.php';
require get_template_directory() . '/inc/customizer/sections/theme-header.php';
require get_template_directory() . '/inc/customizer/sections/main-banner.php';
require get_template_directory() . '/inc/customizer/sections/featured-links.php';
require get_template_directory() . '/inc/customizer/sections/blog-archive.php';
require get_template_directory() . '/inc/customizer/sections/single-post.php';
require get_template_directory() . '/inc/customizer/sections/three-column.php';
require get_template_directory() . '/inc/customizer/sections/products-section.php';
require get_template_directory() . '/inc/customizer/sections/theme-footer.php';
require get_template_directory() . '/inc/customizer/sections/sidebar-layouts.php';
require get_template_directory() . '/inc/admin/customizer-upsell.php';

if ( ! function_exists( 'wp_minimalist_get_google_font_weight_html' ) ) :
    /**
     * get Google font weights html
     *
     * @since 1.0.0
     */
    function wp_minimalist_get_google_font_weight_html() {
		$google_fonts_file = get_template_directory() . '/assets/lib/googleFonts.json';
		$google_fonts = array();
		if ( file_exists( $google_fonts_file ) ) {
            $google_fonts   = json_decode( file_get_contents( $google_fonts_file ), true );
		}
		$font_family = isset( $_REQUEST['font_family'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['font_family'] ) ) : esc_html( 'Montserrat' );
		$font_weights = $google_fonts[$font_family]['variants']['normal'];

        foreach ( $font_weights as $weight_key => $weight ) {
            echo '<option value="'.esc_attr( $weight_key ).'">'. esc_html( $weight_key ).'</option>';
    
		}
        wp_die();
    }
endif;
add_action( "wp_ajax_wp_minimalist_get_google_font_weight_html", "wp_minimalist_get_google_font_weight_html" );