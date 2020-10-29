<?php

namespace Elementor;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

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

        /* Option */
        $this->start_controls_section('style', array(
            'label' =>  esc_html__( 'Option', 'printer' ),
            'tab'   =>  Controls_Manager::TAB_STYLE,
        ));

        $this->add_control(
            'barColor',
            [
                'label'     =>  __( 'Bar Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'global' => [
                    'default' => Global_Colors::COLOR_TEXT,
                ],
            ]
        );

        $this->add_control(
            'scaleColor',
            [
                'label'     =>  __( 'Scale Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'global' => [
                    'default' => Global_Colors::COLOR_TEXT,
                ],
            ]
        );

        $this->add_control(
            'textColor',
            [
                'label'     =>  __( 'Title Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-circle .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'percentColor',
            [
                'label'     =>  __( 'Percent Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-circle .percent' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings =   $this->get_settings_for_display();

        $data_settings_options  =   [
            'barColor' => $settings['barColor'],
            'scaleColor' => $settings['scaleColor']
        ];

    ?>

        <div class="element-circle">
            <div class="element-chart chart" data-percent="<?php echo esc_attr( $settings['percent']['size'] ); ?>" data-setting='<?php echo wp_json_encode( $data_settings_options ); ?>'>
                <span class="percent"></span>
            </div>
            <h4 class="title text-center">
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>
        </div>

    <?php


    }

    protected function _content_template() {

    ?>
        <#
        var barColor =  settings.barColor,
            scaleColor =  settings.scaleColor,
            settingOptions = {
                "barColor": barColor,
                "scaleColor": scaleColor
            },
            settingOptionsStr = JSON.stringify( settingOptions );
        #>

        <div class="element-circle">
            <div class="element-chart chart" data-percent="{{ settings.percent.size }}" data-setting="{{ settingOptionsStr }}">
                <span class="percent"></span>
            </div>
            <h4 class="title text-center">
                {{{ settings.title }}}
            </h4>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new printer_widget_circle_progress );