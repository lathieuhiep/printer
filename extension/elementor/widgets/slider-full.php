<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class printer_widget_slider_full extends Widget_Base {

    public function get_categories() {
        return array( 'printer_widgets' );
    }

    public function get_name() {
        return 'printer-slider-full';
    }

    public function get_title() {
        return esc_html__( 'Slider Full', 'printer' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    public function get_script_depends() {
        return ['printer-elementor-custom'];
    }

    protected function _register_controls() {

        /* Section Content */
        $this->start_controls_section(
            'section_content',
            [
                'label' =>  esc_html__( 'Slider Full', 'printer' )
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'printer' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'printer' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__( 'Choose Image', 'printer' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_link',
            [
                'label' => esc_html__( 'Link', 'printer' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'printer' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'printer' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Title #1', 'printer' ),
                    ],
                    [
                        'list_title' => __( 'Title #2', 'printer' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' =>  esc_html__( 'Layout Settings', 'printer' )
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'printer'),
                'label_off'     =>  esc_html__('No', 'printer'),
                'label_on'      =>  esc_html__('Yes', 'printer'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'printer'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'printer'),
                'label_on'      =>  esc_html__('Yes', 'printer'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'printer'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'printer'),
                'label_off'     =>  esc_html__('No', 'printer'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'printer'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'printer'),
                'label_off'     =>  esc_html__('No', 'printer'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings =   $this->get_settings_for_display();
        $data_settings_owl = [
            'items'         =>  1,
            'loop'          =>  ( 'yes' === $settings['loop'] ),
            'nav'           =>  ( 'yes' === $settings['nav'] ),
            'dots'          =>  ( 'yes' === $settings['dots'] ),
            'margin'        =>  50,
            'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
        ];

        ?>

            <div class="element-slider-full">
                <div class="content-box">
                    <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                        <?php
                        foreach ( $settings['list'] as $item ) :
                            $target = $item['list_link']['is_external'] ? ' target=_blank' : '';
                            $nofollow = $item['list_link']['nofollow'] ? ' rel=nofollow' : '';
                        ?>
                        <div class="item">
                            <a class="link-product" href="<?php echo esc_url( $item['list_link']['url'] ); ?>"<?php echo esc_attr( $target . $nofollow ) ?>>
                                <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php


    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new printer_widget_slider_full );