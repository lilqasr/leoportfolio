<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP Minimalist
 */

?>
		</div><!-- .container -->
	</div><!-- #content -->
	<?php
		/**
		* hook - wp_minimalist_before_footer_hook
		*
		* @hooked - wp_minimalist_scroll_to_top
		*
		*/
		if( has_action( 'wp_minimalist_before_footer_hook' ) ) {
			do_action( 'wp_minimalist_before_footer_hook' );
		}

			if( get_theme_mod( 'footer_option', false ) ) :
				$footer_section_width = get_theme_mod( 'footer_section_width', 'full-width' );
				$footer_inner_classes = ( $footer_section_width === 'boxed-width' ) ? 'container' : 'container-fluid';
	?>
				<footer id="colophon" class="site-footer <?php echo esc_html( get_theme_mod( 'footer_widget_column', 'column-two' ) ); ?>">
					<div class="<?php echo esc_attr( $footer_inner_classes ); ?>">
						<div class="row">
							<?php
								get_template_part( '/footer-columns' );
							?>
						</div>
					</div>
				</footer><!-- #colophon -->
		<?php endif;
		?>
		<div id="bottom-footer">
			<?php
				if( has_nav_menu('footer-bottom')):
				?>
				<div class="footer-menu">
					<nav class="footer-nav">
						<?php
	                        wp_nav_menu(
	                            array(
	                                'theme_location' => 'footer-bottom'
	                            )
	                        );
	                    ?>
	                </nav>
				</div>
			<?php endif; ?>
			<div class="copyright">
				<?php echo wp_kses_post( str_replace( '%year%', date('Y'), get_theme_mod( 'bottom_footer_site_info', esc_html__( 'WP Minimalist - Modern WordPress Theme %year%.', 'wp-minimalist' ) ) ) ); ?>
				<?php echo sprintf( esc_html( 'Free Theme By %s.', 'wp-minimalist' ), '<a href="https://blazethemes.com/">' .esc_html( 'BlazeThemes' ). '</a>'  ); ?>

			</div><!-- .copyright -->
		</div><!-- #bottom-footer -->
	<?php
		/**
		* hook - wp_minimalist_after_footer_hook
		*
		* @hooked - wp_minimalist_scroll_to_top
		*
		*/
		if( has_action( 'wp_minimalist_after_footer_hook' ) ) {
			do_action( 'wp_minimalist_after_footer_hook' );
		}
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
