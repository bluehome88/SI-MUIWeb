<?php

if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$cfg = array();

$cfg[ 'page_builder' ] = array(
	'title'			 => esc_html__( 'Special Heading', 'bizipress' ),
	'description'	 => esc_html__( 'Add a Special Heading', 'bizipress' ),
	'tab'			 => esc_html__( 'Content Elements', 'bizipress' ),
	'popup_size'	 => 'large',
	'title_template' => 'Title {{ if (o.title) { }} : {{= o.title}}{{ } }}',
);
