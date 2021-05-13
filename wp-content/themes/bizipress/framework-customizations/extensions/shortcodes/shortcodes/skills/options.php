<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'skills' => array(
		'type'				 => 'addable-popup',
		'label'				 => esc_html__( 'Skillbar', 'bizipress' ),
		'size'				 => 'medium',
		'desc'				 => esc_html__( 'Add Skills Item', 'bizipress' ),
		'template'			 => '{{=title}}',
		'add-button-text'	 => esc_html__( 'Add Skillbar', 'bizipress' ),
		'popup-options' => array(
			'title' => array(
				'label'	 => esc_html__( 'Skills Title', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => 'Design',
				'desc'	 => esc_html__( 'Input Skills Title', 'bizipress' ),
			),
			'percentage' => array(
				'type'		 => 'slider',
				'value'		 => 85,
				'properties' => array(
				/*
				  'min' => 0,
				  'max' => 100,
				  'step' => 1, // Set slider step. Always > 0. Could be fractional.
				 */
				),
				'label'		 => esc_html__( 'Percentage', 'bizipress' ),
				'desc'		 => esc_html__( 'Add Skills Percentace', 'bizipress' ),
			),
		),
	),
);
