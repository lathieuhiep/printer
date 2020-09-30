<?php

/* GET fonts google */
if ( ! function_exists( 'printer_fonts_url' ) ) :

	function printer_fonts_url() {
        return 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap';
	}

endif;

// Remove jquery migrate
add_action( 'wp_default_scripts', 'printer_remove_jquery_migrate' );
function printer_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'printer_register_back_end_scripts');

function printer_register_back_end_scripts(){

	/* Start Get CSS Admin */
	wp_enqueue_style( 'printer-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'printer_register_front_end');

function printer_register_front_end() {

	/*
	* Start Get Css Front End
	* */
	wp_enqueue_style( 'printer-fonts', printer_fonts_url(), array(), null );

	/* Start main Css */
	wp_enqueue_style( 'printer-library', get_theme_file_uri( '/css/library/minify/library.min.css' ), array(), '' );
	/* End main Css */

    /* Start main Css */
    wp_enqueue_style( 'fontawesome-5', get_theme_file_uri( '/fonts/fontawesome/css/all.min.css' ), array(), '5.14.0' );
    /* End main Css */

	/*  Start Style Css   */
	wp_enqueue_style( 'printer-style', get_stylesheet_uri() );
	/*  Start Style Css   */

	/*
	* End Get Css Front End
	* */

	/*
	* Start Get Js Front End
	* */

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'printer-main', get_theme_file_uri( '/js/library/minify/library.min.js' ), array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'printer-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );

	/*
   * End Get Js Front End
   * */

}