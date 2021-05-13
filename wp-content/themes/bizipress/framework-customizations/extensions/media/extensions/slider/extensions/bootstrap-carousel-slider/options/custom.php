<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/*
 * {population-method}.php - extra options for concrete population method,
 *  shown after default options on edit slider page.
 *
 */
$options = array(
	'slider_subtitle'	 => array(
		'label'	 => esc_html__( 'Subtitle', 'bizipress' ),
		'desc'	 => esc_html__( 'This is the text that appears on your slider subtitle', 'bizipress' ),
		'type'	 => 'text',
		'value'	 => esc_html__( 'What you do today', 'bizipress' )
	),
	'slider_desc'		 => array(
		'label'	 => esc_html__( 'Descriptions', 'bizipress' ),
		'desc'	 => esc_html__( 'This is the text that appears on your button', 'bizipress' ),
		'type'	 => 'textarea',
		'value'	 => esc_html__( 'Nobody"s more committed to connecting you with the exceptional', 'bizipress' )
	),
	'button_settings'	 => array(
		'type'				 => 'addable-popup',
		'size'				 => 'large',
		'label'				 => esc_html__( 'Button', 'bizipress' ),
		'add-button-text'	 => esc_html__( 'Add Button', 'bizipress' ),
		'desc'				 => esc_html__( 'Add your slider button', 'bizipress' ),
		'template'			 => 'Button : {{- label }}',
		'popup-options'		 => array(
			'style'			 => array(
				'label'		 => esc_html__( 'Style', 'bizipress' ),
				'desc'		 => esc_html__( 'Choose button style', 'bizipress' ),
				'type'		 => 'image-picker',
				'value'		 => '',
				'choices'	 => array(
					'primary'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button-style2.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button-style2.png'
						),
					),
					'default'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button-style3.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button-style3.png'
						),
					),
				),
			),
			'label'			 => array(
				'label'	 => esc_html__( 'Button Label', 'bizipress' ),
				'desc'	 => esc_html__( 'This is the text that appears on your button', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => esc_html__( 'Our Services', 'bizipress' )
			),
			'link'			 => array(
				'label'	 => esc_html__( 'Button Link', 'bizipress' ),
				'desc'	 => esc_html__( 'Where should your button link to', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => '#'
			),
			'target'		 => array(
				'type'			 => 'switch',
				'label'			 => esc_html__( 'Open Link in New Window', 'bizipress' ),
				'desc'			 => esc_html__( 'Select here if you want to open the linked page in a new window', 'bizipress' ),
				'right-choice'	 => array(
					'value'	 => '_blank',
					'label'	 => esc_html__( 'Yes', 'bizipress' ),
				),
				'left-choice'	 => array(
					'value'	 => '_self',
					'label'	 => esc_html__( 'No', 'bizipress' ),
				),
			),
			'btn_icon_group' => array(
				'type'		 => 'group',
				'options'	 => array(
					'icon'			 => array(
						'type'	 => 'new-icon',
						'label'	 => esc_html__( 'Icon', 'bizipress' )
					),
					'icon_position'	 => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( '', 'bizipress' ),
						'desc'			 => esc_html__( 'Choose the icon position', 'bizipress' ),
						'right-choice'	 => array(
							'value'	 => 'pull-right',
							'label'	 => esc_html__( 'Right', 'bizipress' ),
						),
						'left-choice'	 => array(
							'value'	 => '',
							'label'	 => esc_html__( 'Left', 'bizipress' ),
						),
					),
				)
			)
		)
	),
	'slider_align'			 => array(
		'label'		 => esc_html__( 'Alignment', 'bizipress' ),
		'desc'		 => esc_html__( 'Select the alignment for your Slide', 'bizipress' ),
		'attr'		 => array( 'class' => 'fw-checkbox-float-left' ),
		'type'		 => 'radio',
		'choices'	 => array(
			'text-left'		 => esc_html__( 'Left', 'bizipress' ),
			'text-center'	 => esc_html__( 'Center', 'bizipress' ),
			'text-right'	 => esc_html__( 'Right', 'bizipress' ),
		),
		'value'		 => 'left'
	),
);
