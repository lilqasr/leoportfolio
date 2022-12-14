<?php
/**
 * Handle the wigets files and hooks
 * 
 * @package WP Minimalist
 * 
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_minimalist_widgets_init() {
	// default sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Toggle Sidebar', 'wp-minimalist' ),
			'id'            => 'sidebar-header-toggle',
			'description'   => esc_html__( 'Add widgets here.', 'wp-minimalist' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	// default sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-minimalist' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-minimalist' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	if ( class_exists( 'WooCommerce' ) ) {
		// shop sidebar
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop Sidebar', 'wp-minimalist' ),
				'id'            => 'shop-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'wp-minimalist' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
				'after_title'   => '</h5></div>',
			)
		);	
	}

	// footer sidebars
	register_sidebars( 4, array(
			'name'          => esc_html__( 'Footer Column %d', 'wp-minimalist' ),
			'id'            => 'footer-column',
			'description'   => esc_html__( 'Add widgets here.', 'wp-minimalist' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

    // Register custom widgets
    register_widget( 'wp_minimalist_Category_Collection_Widget' ); // category collection widget
	register_widget( 'wp_minimalist_Posts_List_Widget' ); // posts list widget
	register_widget( 'wp_minimalist_Author_Info_Widget' ); // author widget
	register_widget( 'wp_minimalist_Social_Icons_Widget' ); // social icons widget
	register_widget( 'wp_minimalist_Widget_Title_Widget' ); // widget title widget
}
add_action( 'widgets_init', 'wp_minimalist_widgets_init' );

// includes files
require WP_MINIMALIST_INCLUDES_PATH .'widgets/widget-fields.php';
require WP_MINIMALIST_INCLUDES_PATH .'widgets/category-collection.php';
require WP_MINIMALIST_INCLUDES_PATH .'widgets/posts-list.php';
require WP_MINIMALIST_INCLUDES_PATH .'widgets/author-info.php';
require WP_MINIMALIST_INCLUDES_PATH .'widgets/social-icons.php';
require WP_MINIMALIST_INCLUDES_PATH .'widgets/widget-title.php';

function wp_minimalist_widget_scripts($hook) {
    if( $hook !== "widgets.php" ) {
        return;
    }
    wp_enqueue_style( 'wp-minimalist-widget', get_template_directory_uri() . '/inc/widgets/assets/widgets.css', array(), WP_MINIMALIST_VERSION );

	wp_enqueue_media();
	wp_enqueue_script( 'wp-minimalist-widget', get_template_directory_uri() . '/inc/widgets/assets/widgets.js', array( 'jquery' ), WP_MINIMALIST_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'wp_minimalist_widget_scripts' );