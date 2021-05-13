<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'			 => esc_html__( 'Team Member', 'bizipress' ),
		'description'	 => esc_html__( 'Add a Team Member', 'bizipress' ),
		'tab'			 => esc_html__( 'Content Elements', 'bizipress' ),
		'popup_size'	 => 'medium',
		'title_template' => '{{- title }} {{ if (o.title) { }} : {{= o.title}}{{ } }}',
	)
);
