<?php

if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$options = array(
	'case-study' => array(
		'type'				 => 'addable-popup',
		'label'				 => esc_html__( 'Case Study', 'bizipress' ),
		'desc'				 => esc_html__( 'Add Your Case Study .', 'bizipress' ),
		'template'			 => '{{- title }}',
		'popup-title'		 => null,
		'size'				 => 'small', // small, medium, large
		'limit'				 => 4, // limit the number of popup`s that can be added
		'add-button-text'	 => esc_html__( 'Add Case Study', 'bizipress' ),
		'sortable'			 => true,
		'popup-options'		 => array(
			'image'		 => array(
				'type' => 'upload',
				'label'	 => esc_html__( 'Image', 'bizipress' ),
				'desc'	 => esc_html__( 'Add your case study image', 'bizipress' ),
				'images_only' => true,
//				'files_ext' => array( 'doc', 'pdf', 'zip' ),
//				'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
			),
			'title'		 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Title', 'bizipress' ),
				'value'	 => esc_html__( 'Marketing Growth', 'bizipress' ),
			),
			'subtitle'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Title', 'bizipress' ),
				'value'	 => esc_html__( ' Modern Woodman Ltd.', 'bizipress' ),
			),
			'content'	 => array(
				'type'	 => 'textarea',
				'label'	 => esc_html__( 'Title', 'bizipress' ),
				'value'	 => esc_html__( 'A business strategy is the means by which it sets out to achieve its desired ends. You have ideas, goals, and dreams. We have a culturally diverse, forward thinking team looking for talent like you and make your dream come true.', 'bizipress' ),
			),
			'button'	 => array(
				'type'			 => 'popup',
				'label'			 => esc_html__( 'Button', 'bizipress' ),
				'desc'			 => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'bizipress' ),
				'popup-title'	 => esc_html__( 'Button settings', 'bizipress' ),
				'button'		 => esc_html__( 'Add Button', 'bizipress' ),
				'popup-title'	 => null,
				'size'			 => 'small', // small, medium, large
				'popup-options'	 => array(
					'label'	 => array(
						'label'	 => esc_html__( 'Button Label', 'bizipress' ),
						'desc'	 => esc_html__( 'This is the text that appears on your button', 'bizipress' ),
						'type'	 => 'text',
						'value'	 => esc_html__( 'Read More', 'bizipress' )
					),
					'link'	 => array(
						'label'	 => esc_html__( 'Button Link', 'bizipress' ),
						'desc'	 => esc_html__( 'Where should your button link to', 'bizipress' ),
						'type'	 => 'text',
						'value'	 => '#'
					),
					'target' => array(
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
				),
			),
		),
	),
);
