<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class printer_widget_post_grid extends Widget_Base {

    public function get_categories() {
        return array( 'printer_widgets' );
    }

    public function get_name() {
        return 'printer-post-grid';
    }

    public function get_title() {
        return esc_html__( 'Posts Grid', 'printer' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    protected function _register_controls() {

        /* Section Query */
        $this->start_controls_section(
            'section_query',
            [
                'label' =>  esc_html__( 'Query', 'printer' )
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label'         =>  esc_html__( 'Select Category', 'printer' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  printer_check_get_cat( 'category' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'printer' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'printer' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'            =>  esc_html__( 'Post ID', 'printer' ),
                    'author'        =>  esc_html__( 'Post Author', 'printer' ),
                    'title'         =>  esc_html__( 'Title', 'printer' ),
                    'date'          =>  esc_html__( 'Date', 'printer' ),
                    'rand'          =>  esc_html__( 'Random', 'printer' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'printer' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'printer' ),
                    'DESC'  =>  esc_html__( 'Descending', 'printer' ),
                ],
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
            'column_number',
            [
                'label'     =>  esc_html__( 'Column', 'printer' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  3,
                'options'   =>  [
                    4   =>  esc_html__( '4 Column', 'printer' ),
                    3   =>  esc_html__( '3 Column', 'printer' ),
                    2   =>  esc_html__( '2 Column', 'printer' ),
                    1   =>  esc_html__( '1 Column', 'printer' ),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      =>  'thumbnail',
                'exclude'   =>  [ 'custom' ],
                'default'   =>  'medium_large',
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label'     =>  esc_html__( 'Show excerpt', 'printer' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    '1' => [
                        'title' =>  esc_html__( 'Yes', 'printer' ),
                        'icon'  =>  'fa fa-check',
                    ],
                    '0' => [
                        'title' =>  esc_html__( 'No', 'printer' ),
                        'icon'  =>  'fa fa-ban',
                    ]
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label'     =>  esc_html__( 'Excerpt Words', 'printer' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  '10',
                'condition' =>  [
                    'show_excerpt' => '1',
                ],
            ]
        );

        $this->end_controls_section();

        /* Section style post */
        $this->start_controls_section(
            'section_style_post',
            [
                'label' => esc_html__( 'Color & Typography', 'printer' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Style title post
        $this->add_control(
            'title_post_options',
            [
                'label'     =>  esc_html__( 'Title Post', 'printer' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'title_post_color',
            [
                'label'     =>  esc_html__( 'Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post__title a'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_post_color_hover',
            [
                'label'     =>  esc_html__( 'Color Hover', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post__title a:hover'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_post_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .item-post .item-post__title',
            ]
        );

        $this->add_control(
            'title_post_alignment',
            [
                'label'     =>  esc_html__( 'Title Alignment', 'printer' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'printer' ),
                        'icon'  =>  'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>  esc_html__( 'Center', 'printer' ),
                        'icon'  =>  'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>  esc_html__( 'Right', 'printer' ),
                        'icon'  =>  'fa fa-align-right',
                    ],
                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'printer' ),
                        'icon'  =>  'fa fa-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post .item-post__title'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        // Style excerpt post
        $this->add_control(
            'excerpt_post_options',
            [
                'label'     =>  esc_html__( 'Excerpt Post', 'printer' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label'     =>  esc_html__( 'Color', 'printer' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post .item-post__content p'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .item-post .item-post__content p',
            ]
        );

        $this->add_control(
            'excerpt_alignment',
            [
                'label'     =>  esc_html__( 'Excerpt Alignment', 'printer' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'printer' ),
                        'icon'  =>  'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>  esc_html__( 'Center', 'printer' ),
                        'icon'  =>  'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>  esc_html__( 'Right', 'printer' ),
                        'icon'  =>  'fa fa-align-right',
                    ],
                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'printer' ),
                        'icon'  =>  'fa fa-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-grid .item-post .item-post__content p'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['select_cat'];
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

        if ( !empty( $cat_post ) ) :

            $args = array(
                'post_type'             =>  'post',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'cat'                   =>  $cat_post,
                'ignore_sticky_posts'   =>  1,
            );

        else:

            $args = array(
                'post_type'             =>  'post',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'ignore_sticky_posts'   =>  1,
            );

        endif;

        $query = new \ WP_Query( $args );

        if ( $query->have_posts() ) :

        ?>

            <div class="element-post-grid">
                <div class="row">
                    <?php while ( $query->have_posts() ): $query->the_post(); ?>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( 12 / $settings['column_number'] ); ?>">
                            <div class="item-post">
                                <div class="item-post__thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>

                                            <img src="<?php echo esc_url( Group_Control_Image_Size::get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail', $settings ) ); ?>" alt="<?php the_title(); ?>">

                                        <?php else: ?>

                                            <img src="<?php echo esc_url( get_theme_file_uri( '/images/no-image.png' ) ) ?>" alt="<?php the_title(); ?>" />

                                        <?php endif; ?>
                                    </a>
                                </div>

                                <h2 class="item-post__title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <?php if ( $settings['show_excerpt'] == 1 ) : ?>

                                    <div class="item-post__content">
                                        <p>
                                            <?php
                                            if ( has_excerpt() ) :
                                                echo esc_html( wp_trim_words( get_the_excerpt(), $settings['excerpt_length'], '...' ) );
                                            else:
                                                echo esc_html( wp_trim_words( get_the_content(), $settings['excerpt_length'], '...' ) );
                                            endif;
                                            ?>
                                        </p>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>

        <?php

        endif;
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new printer_widget_post_grid );