<?php

if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$options = array(
	'funfact_style_settings' => array(
		'type'			 => 'multi-picker',
		'label'			 => false,
		'desc'			 => false,
		'picker'		 => array(
			'funfact_style' => array(
				'label'		 => esc_html__( 'Funfact Style', 'bizipress' ),
				'type'		 => 'image-picker',
				'value'		 => 'funfact-1',
				'desc'		 => false,
				'choices'	 => array(
					'funfact-1'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/fact/fact1.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/fact/fact1.png'
						),
					),
					'funfact-2'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/fact/fact2.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/fact/fact2.png'
						),
					),
					'funfact-3'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/fact/fact3.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/fact/fact3.png'
						),
					),
				),
			),
		),
		'choices'		 => array(
			'funfact-1'	 => array(
				'show-in-row'	 => array(
					'type'			 => 'short-select',
					'value'			 => '2',
					'label'			 => esc_html__( 'Show in row', 'bizipress' ),
					'desc'			 => esc_html__( 'Show in single row. If you select 2 only two will be show in single row.and rest will be show in next row.', 'bizipress' ),
					'choices'		 => array(
						'2'	 => esc_html__( 'Two', 'bizipress' ),
						'3'	 => esc_html__( 'Three', 'bizipress' ),
						'4'	 => esc_html__( 'Four', 'bizipress' ),
					),
					'no-validate'	 => false,
				),
				'funfact-loop'	 => array(
					'type'				 => 'addable-popup',
					'label'				 => esc_html__( 'Funfact', 'bizipress' ),
					'desc'				 => esc_html__( 'Funfact will be load with one column.', 'bizipress' ),
					'template'			 => '{{- title }}',
					'popup-title'		 => null,
					'size'				 => 'small', // small, medium, large
					'add-button-text'	 => esc_html__( 'Add funfact', 'bizipress' ),
					'sortable'			 => true,
					'popup-options'		 => array(
						'title'	 => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Title', 'bizipress' ),
							'value'	 => esc_html__( 'Clients', 'bizipress' ),
						),
						'number' => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Number', 'bizipress' ),
							'value'	 => esc_html__( '1200', 'bizipress' ),
						),
						'icon'	 => array(
							'type'	 => 'new-icon',
							'label'	 => esc_html__( 'Icon', 'bizipress' ),
							'value'	 => esc_html__( 'ti-user', 'bizipress' ),
						),
					),
				),
			),
			
			'funfact-2'	 => array(
				'title'	 => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Title', 'bizipress' ),
					'value'	 => esc_html__( 'Clients', 'bizipress' ),
				),
				'number' => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Number', 'bizipress' ),
					'value'	 => esc_html__( '1200', 'bizipress' ),
				),
				'icon'	 => array(
					'type'	 => 'new-icon',
					'label'	 => esc_html__( 'Icon', 'bizipress' ),
					'value'	 => esc_html__( 'icon icon-pie-chart2', 'bizipress' ),
				),
			),
			'funfact-3'	 => array(
				'show-in-row'	 => array(
					'type'			 => 'short-select',
					'value'			 => '2',
					'label'			 => esc_html__( 'Show in row', 'bizipress' ),
					'desc'			 => esc_html__( 'Show in single row. If you select 2 only two will be show in single row.and rest will be show in next row.', 'bizipress' ),
					'choices'		 => array(
						'2'	 => esc_html__( 'Two', 'bizipress' ),
						'3'	 => esc_html__( 'Three', 'bizipress' ),
						'4'	 => esc_html__( 'Four', 'bizipress' ),
					),
					'no-validate'	 => false,
				),
				'funfact-loop'	 => array(
					'type'				 => 'addable-popup',
					'label'				 => esc_html__( 'Funfact', 'bizipress' ),
					'desc'				 => esc_html__( 'Funfact will be load with one column.', 'bizipress' ),
					'template'			 => '{{- title }}',
					'popup-title'		 => null,
					'size'				 => 'small', // small, medium, large
					'add-button-text'	 => esc_html__( 'Add funfact', 'bizipress' ),
					'sortable'			 => true,
					'popup-options'		 => array(
						'title'	 => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Title', 'bizipress' ),
							'value'	 => esc_html__( 'Clients', 'bizipress' ),
						),
						'number' => array(
							'type'	 => 'text',
							'label'	 => esc_html__( 'Number', 'bizipress' ),
							'value'	 => esc_html__( '1200', 'bizipress' ),
						),
						'icon'	 => array(
							'type'	 => 'new-icon',
							'label'	 => esc_html__( 'Icon', 'bizipress' ),
							'value'	 => esc_html__( 'ti-user', 'bizipress' ),
						),
					),
				),
			),
		),
		'show_borders'	 => false,
	),
);
