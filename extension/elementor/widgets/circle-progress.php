<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class printer_widget_circle_progress extends Widget_Base {

    public function get_categories() {
        return array( 'printer_widgets' );
    }

    public function get_name() {
        return 'printer-circle-progress';
    }

    public function get_title() {
        return esc_html__( 'Circle Progress', 'printer' );
    }

    public function get_icon() {
        return 'fas fa-chart-pie';
    }

    public function get_script_depends() {
        return ['printer-elementor-custom'];
    }

    protected function _register_controls() {

        /* Section Content */
        $this->start_controls_section(
            'section_content',
            [
                'label' =>  esc_html__( 'Content', 'printer' )
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $settings =   $this->get_settings_for_display();

    ?>

        <div class="element-circle">
            <strong></strong>
        </div>

    <?php


    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new printer_widget_circle_progress );