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

        $this->add_control(
            'percent',
            [
                'label' => esc_html__( 'percent', 'printer' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
            ]
        );

        $this->add_control(
            'title', [
                'label' => esc_html__( 'Title', 'printer' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Title' , 'printer' ),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings =   $this->get_settings_for_display();

    ?>

        <div class="element-circle">
            <div class="element-chart chart" data-percent="<?php echo esc_attr( $settings['percent']['size'] ); ?>">
                <span class="percent"></span>
            </div>
            <h4 class="title text-center">
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>
        </div>

    <?php


    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new printer_widget_circle_progress );