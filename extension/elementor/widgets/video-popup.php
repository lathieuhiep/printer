<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class printer_video_popup extends Widget_Base {

    public function get_categories() {
        return array( 'printer_widgets' );
    }

    public function get_name() {
        return 'printer-video-popup';
    }

    public function get_title() {
        return esc_html__( 'Video Popup Theme', 'printer' );
    }

    public function get_icon() {
        return 'fa fa-play';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'printer' ),
            ]
        );

        $this->add_control(
            'title', [
                'label'         =>  esc_html__( 'Title', 'printer' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Video',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label'         =>  esc_html__( 'Link', 'printer' ),
                'type'          =>  Controls_Manager::URL,
                'placeholder'   =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
                'show_external' =>  false,
                'default' => [
                    'url'   =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
                ],
            ]
        );

        $this->end_controls_section();

        /*STYLE TAB*/
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__( 'Button', 'printer' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label'     =>  esc_html__( 'Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-video-popup a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label'     =>  esc_html__( 'Background Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-video-popup a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'style_with',
            [
                'label' => esc_html__( 'Style Width', 'printer' ),
                'type' =>Controls_Manager::SELECT,
                'default' => 'auto',
                'options' => [
                    'auto'  => esc_html__( 'Auto', 'printer' ),
                    'custom' => esc_html__( 'Custom', 'printer' ),
                ],
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => esc_html__( 'Width', 'printer' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'condition' => [
                    'style_with!' => 'auto',
                ],
                'selectors' => [
                    '{{WRAPPER}} .element-video-popup a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    ?>

        <div class="element-video-popup">
            <a class="link-video" href="<?php echo esc_url( $settings['link']['url'] ) ?>" data-lity>
                <?php echo esc_html( $settings['title'] ); ?>
            </a>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new printer_video_popup );