<?php

if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$options = array(
	'testimonial_style_settings' => array(
		'type'			 => 'multi-picker',
		'label'			 => false,
		'desc'			 => false,
		'picker'		 => array(
			'testimonial_style' => array(
				'label'		 => esc_html__( 'Testimonial Style', 'bizipress' ),
				'type'		 => 'image-picker',
				'value'		 => 'testimonial-1',
				'desc'		 => esc_html__( 'Select your favorite testimonial style', 'bizipress' ),
				'choices'	 => array(
					'testimonial-1'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial1.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial1.png'
						),
					),
					'testimonial-2'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial2.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial2.png'
						),
					),
					'testimonial-3'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial3.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial3.png'
						),
					),
					'testimonial-4'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial4.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/testimonial/testimonial4.png'
						),
					),
				),
			),
		),
		'choices'		 => array(
			'testimonial-1'	 => array(
				'image'		 => array(
					'type'	 => 'upload',
					'label'	 => esc_html__( 'Photo', 'bizipress' ),
					'desc'	 => esc_html__( 'Upload your testimonial person photo', 'bizipress' ),
				),
				'quotation'	 => array(
					'type'	 => 'textarea',
					'label'	 => esc_html__( 'Quotation', 'bizipress' ),
					'desc'	 => esc_html__( 'Add testimonial main quotations', 'bizipress' ),
					'value'	 => esc_html__( 'Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose. Lorem Ipsum is that it as opposed to using.', 'bizipress' )
				),
				'name'		 => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Name', 'bizipress' ),
					'desc'	 => esc_html__( 'Add testimonial author name', 'bizipress' ),
					'value'	 => esc_html__( 'Sarah Arevik', 'bizipress' )
				),
				'position'	 => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Position', 'bizipress' ),
					'desc'	 => esc_html__( 'Add your testimonial author position', 'bizipress' ),
					'value'	 => wp_kses_post( 'Chief Executive', 'bizipress' )
				)
			),

			'testimonial-2'	 => array(
				'testimonials' => array(
					'type'				 => 'addable-popup',
					'label'				 => esc_html__( 'Testimonials', 'bizipress' ),
					'desc'				 => esc_html__( 'Add testimonials items here', 'bizipress' ),
					'size'				 => 'large',
					'template'			 => '{{- name}}',
					'add-button-text'	 => esc_html__( 'Add Testimonial', 'bizipress' ),
					'popup-options'		 => array(
						'image'		 => array(
							'type'	 => 'upload',
							'label'	 => esc_html__( 'Photo', 'bizipress' ),
							'desc'	 => esc_html__( 'Upload your testimonial person photo', 'bizipress' ),
						),
						'quotation'	 => array(
							'type'	 => 'textarea',
							'label'	 => esc_html__( 'Quotation', 'bizipress' ),
							'desc'	 => esc_html__( 'Add testimonial main quotations', 'bizipress' ),
							'value'	 => esc_html__( 'Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose. Lorem Ipsum is that it as opposed to using.', 'bizipress' )
						),
						'name'		 => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Name', 'bizipress' ),
							'desc'	 => esc_html__( 'Add testimonial author name', 'bizipress' ),
							'value'	 => esc_html__( 'Sarah Arevik', 'bizipress' )
						),
						'position'	 => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Position', 'bizipress' ),
							'desc'	 => esc_html__( 'Add your testimonial author position', 'bizipress' ),
							'value'	 => wp_kses_post( 'Chief Executive', 'bizipress' )
						)
					),
				),
			),
			'testimonial-3'	 => array(
				'testimonials' => array(
					'type'				 => 'addable-popup',
					'label'				 => esc_html__( 'Testimonials', 'bizipress' ),
					'desc'				 => esc_html__( 'Add testimonials items here', 'bizipress' ),
					'size'				 => 'large',
					'template'			 => '{{- name}}',
					'add-button-text'	 => esc_html__( 'Add Testimonial', 'bizipress' ),
					'popup-options'		 => array(
						'image'		 => array(
							'type'	 => 'upload',
							'label'	 => esc_html__( 'Photo', 'bizipress' ),
							'desc'	 => esc_html__( 'Upload your testimonial person photo', 'bizipress' ),
						),
						'quotation'	 => array(
							'type'	 => 'textarea',
							'label'	 => esc_html__( 'Quotation', 'bizipress' ),
							'desc'	 => esc_html__( 'Add testimonial main quotations', 'bizipress' ),
							'value'	 => esc_html__( 'Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose. Lorem Ipsum is that it as opposed to using.', 'bizipress' )
						),
						'name'		 => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Name', 'bizipress' ),
							'desc'	 => esc_html__( 'Add testimonial author name', 'bizipress' ),
							'value'	 => esc_html__( 'Sarah Arevik', 'bizipress' )
						),
						'position'	 => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Position', 'bizipress' ),
							'desc'	 => esc_html__( 'Add your testimonial author position', 'bizipress' ),
							'value'	 => wp_kses_post( 'Chief Executive', 'bizipress' )
						)
					),
				),
			),
			'testimonial-4'	 => array(
				'image'		 => array(
					'type'	 => 'upload',
					'label'	 => esc_html__( 'Photo', 'bizipress' ),
					'desc'	 => esc_html__( 'Upload your testimonial person photo', 'bizipress' ),
				),
				'quotation'	 => array(
					'type'	 => 'textarea',
					'label'	 => esc_html__( 'Quotation', 'bizipress' ),
					'desc'	 => esc_html__( 'Add testimonial main quotations', 'bizipress' ),
					'value'	 => esc_html__( 'Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose. Lorem Ipsum is that it as opposed to using.', 'bizipress' )
				),
				'name'		 => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Name', 'bizipress' ),
					'desc'	 => esc_html__( 'Add testimonial author name', 'bizipress' ),
					'value'	 => esc_html__( 'Sarah Arevik', 'bizipress' )
				),
				'position'	 => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Position', 'bizipress' ),
					'desc'	 => esc_html__( 'Add your testimonial author position', 'bizipress' ),
					'value'	 => wp_kses_post( 'Chief Executive', 'bizipress' )
				)
			)
		),
		'show_borders'	 => false,
	),
	'class'						 => array(
		'attr'	 => array( 'class' => 'border-bottom-none' ),
		'label'	 => esc_html__( 'Custom Class', 'bizipress' ),
		'desc'	 => esc_html__( 'Enter custom CSS class', 'bizipress' ),
		'type'	 => 'text',
		'help'	 => esc_html__( 'You can use this class to further style this shortcode.', 'bizipress' ),
		'value'	 => '',
	),
);
