<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','AnHaiShipWebsite_config_theme' );

        function AnHaiShipWebsite_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $AnHaiShipWebsite_options;
                    $AnHaiShipWebsite_favicon = $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_favicon_upload']['url'];

                    if( $AnHaiShipWebsite_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $AnHaiShipWebsite_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'AnHaiShipWebsite_custom_css', 99 );

        function AnHaiShipWebsite_custom_css() {

            global $AnHaiShipWebsite_options;

            $AnHaiShipWebsite_typo_selecter_1   =   $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_custom_typography_1_selector'];

            $AnHaiShipWebsite_typo1_font_family   =   $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_custom_typography_1']['font-family'];

            $AnHaiShipWebsite_css_style = '';

            if ( $AnHaiShipWebsite_typo1_font_family != '' ) :
                $AnHaiShipWebsite_css_style .= ' '.esc_attr( $AnHaiShipWebsite_typo_selecter_1 ).' { font-family: '.balanceTags( $AnHaiShipWebsite_typo1_font_family, true ).' }';
            endif;

            if ( $AnHaiShipWebsite_css_style != '' ) :
                wp_add_inline_style( 'AnHaiShipWebsite-style', $AnHaiShipWebsite_css_style );
            endif;

        }

    endif;
