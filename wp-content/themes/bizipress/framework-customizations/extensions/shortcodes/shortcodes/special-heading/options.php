<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'xs_id'				 => array(
		'type'	 => 'unique',
		'length' => 8
	),
	'heading_settings'	 => array(
		'type'			 => 'multi-picker',
		'label'			 => false,
		'desc'			 => false,
		'picker'		 => array(
			'heading_style' => array(
				'label'		 => esc_html__( 'Heading Style', 'bizipress' ),
				'type'		 => 'image-picker',
				'value'		 => 'heading-style-1',
				'desc'		 => false,
				'choices'	 => array(
					'heading-style-1'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style1.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style1.png'
						),
					),
					'heading-style-2'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style2.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style2.png'
						),
					),
					'heading-style-3'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style3.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style3.png'
						),
					),
					'heading-style-4'	 => array(
						'small'	 => array(
							'height' => 70,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style4.png'
						),
						'large'	 => array(
							'height' => 214,
							'src'	 => BIZIPRESS_IMAGES . '/image-picker/heading/title-style4.png'
						),
					),
				),
			),
		),
		'choices'		 => array(
			'heading-style-1'	 => array(),
			'heading-style-2'	 => array(
			),
			'heading-style-3'	 => array(
				'border' => array(
					'type'			 => 'switch',
					'value'			 => 'yes',
					'label'			 => esc_html__( 'Border', 'bizipress' ),
					'desc'			 => esc_html__( 'Use border in left?', 'bizipress' ),
					'left-choice'	 => array(
						'value'	 => 'yes',
						'label'	 => esc_html__( 'Yes', 'bizipress' ),
					),
					'right-choice'	 => array(
						'value'	 => 'no',
						'label'	 => esc_html__( 'No', 'bizipress' ),
					),
				),
			),
			'heading-style-4'	 => array(
				'watertitle' => array(
					'type'	 => 'text',
					'label'	 => esc_html__( 'Water title', 'bizipress' ),
					'desc'	 => esc_html__( 'Add your like to use water title in background', 'bizipress' ),
				),
			),
		),
		'show_borders'	 => false,
	),
	'subheading_group'	 => array(
		'type'		 => 'group',
		'attr'		 => array( 'class' => 'xs-group xs-descleft' ),
		'options'	 => array(
			'html_label'	 => array(
				'type'	 => 'html',
				'value'	 => '',
				'label'	 => esc_html__( 'Short Heading', 'bizipress' ),
				'html'	 => '',
			),
			'subtitle'		 => array(
				'type'	 => 'text',
				'label'	 => false,
				'desc'	 => esc_html__( 'Write the short title content', 'bizipress' ),
			),
			'subtitle_size'	 => array(
				'type'	 => 'short-text',
				'label'	 => false,
				'desc'	 => esc_html__( 'Short Heading Size', 'bizipress' ),
			),
			'subtitle_color' => array(
				'type'	 => 'color-picker',
				'attr'	 => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label'	 => false,
				'desc'	 => esc_html__( 'Short Heading Color', 'bizipress' ),
				'help'	 => esc_html__( 'If you want use diffrent heading color for parallax or video section. you can easily change from here', 'bizipress' ),
			),
		),
	),
	'heading_group'		 => array(
		'type'		 => 'group',
		'attr'		 => array( 'class' => 'xs-group xs-descleft' ),
		'options'	 => array(
			'html_label' => array(
				'type'	 => 'html',
				'value'	 => '',
				'label'	 => esc_html__( 'Heading', 'bizipress' ),
				'html'	 => '',
			),
			'title'		 => array(
				'type'	 => 'text',
				'label'	 => false,
				'desc'	 => esc_html__( 'Write the heading title content', 'bizipress' ),
			),
			'heading'	 => array(
				'type'		 => 'short-select',
				'label'		 => false,
				'value'		 => 'h3',
				'choices'	 => array(
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				)
			),
			'title_size' => array(
				'type'	 => 'short-text',
				'label'	 => false,
				'desc'	 => esc_html__( 'Font Size', 'bizipress' ),
			),
			'color'		 => array(
				'type'	 => 'color-picker',
				'label'	 => false,
				'desc'	 => esc_html__( 'Heading Color', 'bizipress' ),
				'help'	 => esc_html__( 'If you want use diffrent heading color for parallax or video section. you can easily change from here', 'bizipress' ),
			),
		),
	),
	'heading_margin'	 => array(
		'type'		 => 'slider',
		'properties' => array(
			'min'	 => 0,
			'max'	 => 120,
		),
		'value'		 => 60,
		'label'		 => esc_html__( 'Margin Bottom', 'bizipress' ),
		'desc'		 => esc_html__( 'Heading Margin bottom', 'bizipress' ),
	),
	'class'				 => array(
		'type'	 => 'text',
		'label'	 => esc_html__( 'Custom Class', 'bizipress' ),
		'desc'	 => esc_html__( 'Enter a custom CSS class', 'bizipress' ),
		'help'	 => esc_html__( 'You can use this class to further style this shortcode by adding your custom CSS.', 'bizipress' ),
	),
);
