<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'feature-picker' => array(
		'type'			 => 'multi-picker',
		'label'			 => false,
		'desc'			 => false,
		'picker'		 => array(
			'service_style' => array(
				'label'		 => esc_html__( 'Service Style', 'bizipress' ),
				'desc'		 => esc_html__( 'Choose Service style', 'bizipress' ),
				'type'		 => 'image-picker',
				'value'		 => 'service-1',
				'choices'	 => array(
					'service-1'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/feature/feature1.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/feature/feature1.png'
						),
					),
					'service-2'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/feature/feature2.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/feature/feature2.png'
						),
					),
					'service-3'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/feature/feature3.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/feature/feature3.png'
						),
					),
				),
			),
		),
		'show_borders'	 => false,
	),
	
	'posts_per_page' => array(
		'type'		 => 'radio',
		'attr'		 => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label'		 => esc_html__( 'Select Post Number', 'bizipress' ),
		'desc'		 => esc_html__( 'How many post do you show in a row?', 'bizipress' ),
		'value'		 => '3',
		'choices'	 => array(
			'3'	 => esc_html__( '3', 'bizipress' ),
			'6'	 => esc_html__( '6', 'bizipress' ),
			'9' => esc_html__( '9', 'bizipress' ),
			'-1' => esc_html__( 'all', 'bizipress' ),
		),
		'inline'	 => true,
	),
);
