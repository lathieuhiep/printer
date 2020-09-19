<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'printer_widgets_init');

function printer_widgets_init() {

	$printer_widgets_arr  =   array(

		'printer-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'printer' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'printer' )
		),

		'printer-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'printer' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'printer' )
		),

		'printer-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'printer' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'printer' )
		),

		'printer-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'printer' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'printer' )
		),

		'printer-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'printer' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'printer' )
		),

		'printer-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'printer' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'printer' )
		)

	);

	foreach ( $printer_widgets_arr as $printer_widgets_id => $printer_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $printer_widgets_value['name'] ),
			'id'            =>  esc_attr( $printer_widgets_id ),
			'description'   =>  esc_attr( $printer_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}