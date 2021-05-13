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
		'desc'	 => esc_html__( 'To Change Your World', 'bizipress' ),
		'type'	 => 'text',
		'value'	 => esc_html__( 'What you do today', 'bizipress' )
	),
	'slider_desc'		 => array(
		'label'	 => esc_html__( 'Descriptions', 'bizipress' ),
		'desc'	 => esc_html__( 'This is the text that appears on your button', 'bizipress' ),
		'type'	 => 'textarea',
		'value'	 => esc_html__( 'You have ideas, goals, and dreams. We have a culturally diverse, forward thinking team looking for talent like.', 'bizipress' )
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
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button/button2.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button/button2.png'
						),
					),
					'default'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button/button1.png'
						),
						'large'	 => array(
							'height' => 208,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/button/button1.png'
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
		)
	),
);
