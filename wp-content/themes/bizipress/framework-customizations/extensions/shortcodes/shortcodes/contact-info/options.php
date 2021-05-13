<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'contact_info_picker' => array(
		'type'			 => 'multi-picker',
		'label'			 => false,
		'desc'			 => false,
		'picker'		 => array(
			'contact_info_style' => array(
				'label'		 => esc_html__( 'Contact info Style', 'bizipress' ),
				'desc'		 => esc_html__( 'Choose contact style', 'bizipress' ),
				'type'		 => 'image-picker',
				'value'		 => 'contact_info-1',
				'choices'	 => array(
					'contact_info-1'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/features-style1.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/features-style1.png'
						),
					),
					'contact_info-2'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/features-style1.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/features-style1.png'
						),
					),
				),
			),
		),
		'choices'		 => array(
			'contact_info-1'	 => array(
				'icon' => array(
					'type'	 => 'new-icon',
					'value'	 => 'fa fa-heart-o',
					'label'	 => esc_html__( 'Contact Icon', 'bizipress' ),
				)
			),
			'contact_info-2'	 => array(
				'icon' => array(
					'type'	 => 'new-icon',
					'value'	 => 'fa fa-heart-o',
					'label'	 => esc_html__( 'Contact Icon', 'bizipress' ),
				),
			),
		),
		'show_borders'	 => false,
	),
	'title'			 => array(
		'type'	 => 'text',
		'value'	 => esc_html__( 'Find Us', 'bizipress' ),
		'label'	 => esc_html__( 'Title of the Box', 'bizipress' ),
	),
	'content'		 => array(
		'label'	 => esc_html__( 'Box Description', 'bizipress' ),
		'desc'	 => esc_html__( 'Add the box description text', 'bizipress' ),
		'type'	 => 'textarea',
		'value'	 => esc_html__( 'Bras urna felis accumsan at ultrde cesid posuere masa socis nautoque penat', 'bizipress' )
	),
	'class' => array(
        'label' => esc_html__('Custom Class', 'bizipress'),
        'desc' => esc_html__('Enter custom CSS class', 'bizipress'),
        'help' => esc_html__('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /bizipress-child/style.css', 'bizipress'),
        'type' => 'text',
        'value' => '',
    ),
);
