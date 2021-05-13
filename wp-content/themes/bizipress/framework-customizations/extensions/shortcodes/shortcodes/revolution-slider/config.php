<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


if ( ! function_exists( 'set_revslider_as_theme' ) ) {
	return;
}

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Revolution Slider', 'bizipress' ),
		'description' => esc_html__( 'Revolution Slider Shortcode', 'bizipress' ),
		'tab'         => esc_html__( 'Media Elements', 'bizipress' ),
		'popup_size'  => 'small',
	)
);