<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','printer_config_theme' );

        function printer_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $printer_options;
                    $printer_favicon = $printer_options['printer_favicon_upload']['url'];

                    if( $printer_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $printer_favicon ) . '" type="image/x-icon" />';

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

        add_action( 'wp_enqueue_scripts', 'printer_custom_css', 99 );

        function printer_custom_css() {

            global $printer_options;

            $printer_typo_selecter_1   =   $printer_options['printer_custom_typography_1_selector'];

            $printer_typo1_font_family   =   $printer_options['printer_custom_typography_1']['font-family'] == '' ? '' : $printer_options['printer_custom_typography_1']['font-family'];

            $printer_css_style = '';

            if ( $printer_typo1_font_family != '' ) :
                $printer_css_style .= ' '.esc_attr( $printer_typo_selecter_1 ).' { font-family: '.balanceTags( $printer_typo1_font_family, true ).' }';
            endif;

            if ( $printer_css_style != '' ) :
                wp_add_inline_style( 'printer-style', $printer_css_style );
            endif;

        }

    endif;
