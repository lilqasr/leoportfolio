<?php
/**
 * Custom Search Form
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP Minimalist
 * @since 1.0.0
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<span class="screen-reader-text"><?php _x( 'Search for:', 'Screen reader text', 'wp-minimalist' ); ?></span>
	    <input type="text" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="<?php echo esc_html( get_theme_mod( 'header_search_placeholder', esc_html__( 'Search something here . .', 'wp-minimalist' ) ) ) ; ?>">
		<button class="search-button" type="submit"><i class="fas fa-arrow-right"></i></button>		
	</div>
</form>