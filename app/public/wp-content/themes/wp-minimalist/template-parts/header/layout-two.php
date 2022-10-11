<?php
/**
 * Header Template - layout two
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
?>
<header class="theme-default">
    <div class="container">
        <div class="header-wrapper">
            <div class="row top_header_col">
                <div class="header__icon-group">
                    <?php 
                    if( get_theme_mod( 'header_social_option', true ) ) :
                        $social_icons_target = get_theme_mod( 'social_icons_target', '_blank' );
                        $social_icons = get_theme_mod( 'social_icons', json_encode( array(
                                array(
                                    'icon_class'    => esc_attr( 'fab fa-linkedin-in' ),
                                    'icon_url'  => '',
                                    'item_option'   => 'show'
                                ),
                                array(
                                    'icon_class'    => esc_attr( 'fab fa-twitter' ),
                                    'icon_url'  => '',
                                    'item_option'   => 'show'
                                ),
                                array(
                                    'icon_class'    => esc_attr( 'fab fa-vimeo-v' ),
                                    'icon_url'  => '',
                                    'item_option'   => 'show'
                                ),
                                array(
                                    'icon_class'    => esc_attr( 'fab fa-instagram' ),
                                    'icon_url'  => '',
                                    'item_option'   => 'show'
                                )
                            ))
                        );
                        $social_icons_docoded = json_decode( $social_icons );
                    ?>
                    <div class="social">
                        <?php
                            foreach( $social_icons_docoded as $social_icon ) {
                                $icon_value = $social_icon->icon_class;
                                $icon_link = $social_icon->icon_url;
                                if( $social_icon->item_option  === 'show' ) echo '<a href="' .esc_url( $icon_link ). '" target="' .esc_attr( $social_icons_target ). '"><i class="' .esc_attr( $icon_value ). '"></i></a>';
                            }
                        ?>
                        <a id="mobile-menu-controller" href="#"><i class="fas fa-bars"></i></a>
                        </div>
                    <?php
                    endif;
                ?>
                </div>

                <div class="logo_wrap">
                    <?php
                        the_custom_logo();
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="has_dot"><?php bloginfo( 'name' ); ?></a></h1>
                          <?php
                        $wp_minimalist_description = get_bloginfo( 'description', 'display' );
                        if ( $wp_minimalist_description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo wp_kses_post( $wp_minimalist_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    <?php
                        endif;
                    ?>
                </div>

                <div class="search__icon-group">
                    <?php 
                        if( get_theme_mod( 'header_search_option', true ) ) {
                            echo '<a href="#" id="search"><i class="fas fa-search"></i></a>';
                            ?>
                            <div id="search-box">
                                <div class="container">
                                    <?php echo get_search_form(); ?>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    <?php if( get_theme_mod( 'header_sidebar_toggle_bar_option', true ) ) : ?>
                        <a class="header-sidebar-trigger sidebar-toggle-trigger" href="javascript:void(0);">
                            <div class="hamburger">
                              <span></span>
                              <span class="middle"></span>
                              <span></span>
                            </div>
                        </a>

                        <div class="header-sidebar-content">
                            <div class="header_sidebar-content-inner-wrap">
                                <div class="header-sidebar-trigger-close"><a href="javascript:void(0);"><i class="fas fa-times"></i></a></div>
                                <?php 
                                    if( is_active_sidebar('sidebar-header-toggle') ) {
                                            dynamic_sidebar('sidebar-header-toggle');
                                    } else {
                                        the_widget( 'WP_Widget_Recent_Posts' );
                                    ?>
                                        <div class="widget widget_categories">
                                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'wp-minimalist' ); ?></h2>
                                            <ul>
                                                <?php
                                                    wp_list_categories(
                                                        array(
                                                            'orderby'    => 'count',
                                                            'order'      => 'DESC',
                                                            'title_li'   => '',
                                                            'number'     => 6,
                                                        )
                                                    );
                                                ?>
                                            </ul>
                                        </div><!-- .widget -->
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row menu_nav_content">
                <nav id="site-navigation">
                    <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i><span class="menu_txt"><?php esc_html_e('MENU','wp-minimalist') ?></button>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                    ?>
                </nav>
            </div>
    </div>
</header>