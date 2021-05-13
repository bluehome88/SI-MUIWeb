<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Pricing Table', 'bizipress' ),
	'description' => esc_html__( 'Add a Table', 'bizipress' ),
	'tab'         => esc_html__( 'Content Elements', 'bizipress' ),
	'popup_size'  => 'large'
);