<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'  => 'textarea',
		'value' => '',
		'label' => esc_html__( 'Code', 'bizipress' ),
		'desc'  => esc_html__( 'Enter the HTML code', 'bizipress' )
	),
	
);