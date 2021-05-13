<?php

if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$cfg = array(
	'page_builder' => array(
		'title'			 => esc_html__( 'Services', 'bizipress' ),
		'description'	 => esc_html__( 'Show Services', 'bizipress' ),
		'tab'			 => esc_html__( 'Content Elements', 'bizipress' ),
		'title_template' => 'Services {{ if (o.posts_per_page) { }} : {{= o.posts_per_page}}{{ } }} posts',
	)
);
