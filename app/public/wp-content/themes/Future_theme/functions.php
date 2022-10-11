<?php
function future_enqueue_scripts() {
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/main.css',  array(), false, 'all' );
  wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/main.js',  array(), false, true );

}

add_action( 'wp_enqueue_scripts', 'future_enqueue_scripts' );

function future_excerpt_length() {
    return 65;
}

add_filter( 'excerpt_length', 'future_excerpt_length', 999 );

function future_theme_setup(){
	add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'future_theme_setup' );