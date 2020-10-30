<?php

namespace Elementor;

final class printer_plugin_elementor_widgets {

    private static $_instance = null;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Plugin constructor.
     */
    public function __construct() {

        $this->init();

    }

    public function init() {

        add_action( 'elementor/elements/categories_registered', [ $this, 'init_category' ] );

        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'init_script'] );

    }

    public function init_category() {

        Plugin::instance()->elements_manager->add_category(
            'printer_widgets',
            [
                'title' => esc_html__( 'Basic Theme Widgets', 'printer' ),
                'icon'  => 'icon-goes-here'
            ]
        );

    }

    public function init_widgets() {

        $build_widgets_filename = [
            'slides',
            'post-grid',
            'post-carousel',
            'about-text',
            'partners-carousel',
            'slider-full',
            'video-popup',
            'circle-progress'
        ];
        
        foreach ( $build_widgets_filename as $widget_filename ) :

            // Include Widget files
            require get_parent_theme_file_path( '/extension/elementor/widgets/'. $widget_filename .'.php' );

        endforeach;

    }

    public function init_script() {
        wp_register_script( 'printer-elementor-custom', get_theme_file_uri( '/js/elementor-custom.js' ), array(), '1.0.0', true );
    }

}

printer_plugin_elementor_widgets::instance();