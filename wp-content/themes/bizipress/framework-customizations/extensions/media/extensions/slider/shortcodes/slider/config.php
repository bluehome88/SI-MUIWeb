<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg[ 'page_builder' ] = array(
	'title'			 => esc_html__( 'Slider', 'bizipress' ),
	'description'	 => esc_html__( 'Add a Slider', 'bizipress' ),
	'tab'			 => esc_html__( 'Media Elements', 'bizipress' ),
	'popup_size'	 => 'small',
);
