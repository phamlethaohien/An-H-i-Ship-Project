<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'AnHaiShipWebsite_widgets_init');

function AnHaiShipWebsite_widgets_init() {

	$AnHaiShipWebsite_widgets_arr  =   array(

		'sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'AnHaiShipWebsite' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'AnHaiShipWebsite' )
		),

		'sidebar-footer'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer', 'AnHaiShipWebsite' ),
			'description'       =>  esc_html__('Display sidebar footer on all page.', 'AnHaiShipWebsite' )
		),

	);

	foreach ( $AnHaiShipWebsite_widgets_arr as $AnHaiShipWebsite_widgets_id => $AnHaiShipWebsite_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $AnHaiShipWebsite_widgets_value['name'] ),
			'id'            =>  esc_attr( $AnHaiShipWebsite_widgets_id ),
			'description'   =>  esc_attr( $AnHaiShipWebsite_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}