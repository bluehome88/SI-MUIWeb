<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'styling_settings' => array(
		'title'		 => esc_html__( 'Styling Settings', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'header-styling-box' => array(
				'title'		 => esc_html__( 'Styling Settings', 'bizipress' ),
				'type'		 => 'box',
				'options'	 => array(
					'main_color'		 => array(
						'type'	 => 'color-picker',
						'label'	 => 'Theme Color',
						'desc'	 => 'You can use any color in your theme',
						'value'	 => '#2154cf'
					),
					'secondary_color'	 => array(
						'type'	 => 'color-picker',
						'label'	 => 'Secondary Color',
						'desc'	 => 'You can use any color in your theme',
						'value'	 => '#fc6a2a'
					),
					'others_color'		 => array(
						'type'	 => 'color-picker',
						'label'	 => 'Others Color',
						'desc'	 => 'Somke color need different exposure into theme',
						'value'	 => '#fc6a2a'
					),
					'boxlayout'			 => array(
						'type'			 => 'multi-picker',
						'label'			 => false,
						'desc'			 => false,
						'picker'		 => array(
							'use_boxlayout' => array(
								'label'			 => esc_html__( 'Box Layout', 'bizipress' ),
								'desc'			 => esc_html__( 'Are you interested to use box layout', 'bizipress' ),
								'type'			 => 'switch',
								'right-choice'	 => array(
									'value'	 => 'yes',
									'label'	 => esc_html__( 'Yes', 'bizipress' )
								),
								'left-choice'	 => array(
									'value'	 => 'no',
									'label'	 => esc_html__( 'No', 'bizipress' )
								),
								'value'			 => 'no',
							)
						),
						'choices'		 => array(
							'yes'	 => array(
								'box_image'					 => array(
									'label'		 => __( 'Background Image', 'unyson' ),
									'type'		 => 'background-image',
									'value'		 => 'none',
									'choices'	 => array(
										'none'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/no_pattern.jpg',
											'css'	 => array(
												'background-image' => 'none'
											)
										),
										'bg-1'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/diagonal_bottom_to_top_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-2'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/diagonal_top_to_bottom_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-3'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/dots_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/dots_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-4'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/romb_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/romb_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-5'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/square_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/square_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-6'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/noise_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/noise_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-7'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/vertical_lines_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/vertical_lines_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
										'bg-8'	 => array(
											'icon'	 => BIZIPRESS_IMAGES . '/patterns/waves_pattern_preview.jpg',
											'css'	 => array(
												'background-image'	 => 'url("' . BIZIPRESS_IMAGES . '/patterns/waves_pattern.png' . '")',
												'background-repeat'	 => 'repeat',
											)
										),
									),
									'desc'		 => __( 'Select your box layout.', 'unyson' ),
								),
								'box_image_position_group'	 => array(
									'type'		 => 'group',
									'attr'		 => array( 'class' => 'xs-shortwidth-group' ),
									'options'	 => array(
										'html_label'						 => array(
											'type'	 => 'html',
											'label'	 => esc_html__( 'Position', 'bizipress' ),
											'html'	 => '',
										),
										'box_image_repeat'					 => array(
											'label'		 => false,
											'desc'		 => esc_html__( 'Repeat', 'bizipress' ),
											'type'		 => 'short-select',
											'choices'	 => array(
												'no-repeat'	 => esc_html__( 'No-Repeat', 'bizipress' ),
												'repeat'	 => esc_html__( 'Repeat', 'bizipress' ),
											)
										),
										'box_image_size'					 => array(
											'label'		 => false,
											'help'		 => bizipress_kses( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'bizipress' ),
											'desc'		 => esc_html__( 'Bg Size', 'bizipress' ),
											'type'		 => 'short-select',
											'value'		 => 'cover',
											'choices'	 => array(
												'auto'		 => esc_html__( 'Auto', 'bizipress' ),
												'cover'		 => esc_html__( 'Cover', 'bizipress' ),
												'contain'	 => esc_html__( 'Contain', 'bizipress' ),
											),
											'attr'		 => array( 'class' => 'xs-shortwidth' ),
										),
										'box_image_background_attachment'	 => array(
											'label'		 => false,
											'help'		 => esc_html__( 'The background-attachment property sets whether a background image is fixed or scrolls with the rest of the page.', 'bizipress' ),
											'desc'		 => esc_html__( 'Attachement', 'bizipress' ),
											'type'		 => 'short-select',
											'value'		 => 'scroll',
											'choices'	 => array(
												'scroll' => esc_html__( 'scroll', 'bizipress' ),
												'fixed'	 => esc_html__( 'fixed', 'bizipress' ),
											)
										),
									),
								),
							),
							'no'	 => array(),
						),
						'show_borders'	 => false,
					),
					'typography-global'	 => array(
						'title'		 => esc_html__( 'Global Typography', 'bizipress' ),
						'type'		 => 'box',
						'options'	 => array(
							'body_font'		 => array(
								'type'		 => 'typography-v2',
								'value'		 => array(
									'family'		 => 'Asap',
									// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
									'style'			 => 'regular',
									'weight'		 => 400,
									'subset'		 => 'latin-ext',
									'size'			 => 16,
									'line-height'	 => 30,
//									'letter-spacing' => '',
									'color'			 => '#6a6a6a'
								),
								'components' => array(
									'family'		 => true,
									'style'			 => true,
									'weight'		 => true,
									// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
									'size'			 => true,
									'line-height'	 => true,
									'letter-spacing' => false,
									'color'			 => true
								),
								'label'		 => esc_html__( 'Body Font', 'bizipress' ),
								'desc'		 => esc_html__( 'This is default body font for your site', 'bizipress' ),
							),
							'heading_title'	 => array(
								'type'		 => 'typography-v2',
								'value'		 => array(
									'family'		 => 'gilroyextrabold',
									'style'			 => 'normal',
									'weight'		 => 400,
									'subset'		 => 'latin-ext',
									'variation'		 => 300,
//									'size'			 => 14,
									'line-height'	 => 15,
									'letter-spacing' => 0,
									'color'			 => '#252a37'
								),
								'components' => array(
									'family'		 => true,
									'style'			 => true,
									'weight'		 => true,
									'size'			 => false,
									'line-height'	 => false,
									'letter-spacing' => false,
									'color'			 => true
								),
								'label'		 => esc_html__( 'Heading Fonts', 'bizipress' ),
								'desc'		 => esc_html__( 'This is for heading google fonts', 'bizipress' ),
							),
							'extra_fonts'	 => array(
								'type'		 => 'typography-v2',
								'value'		 => array(
									'family'		 => 'Asap',
									'style'			 => 'italic',
									'weight'		 => 400,
									'subset'		 => 'latin-ext',
									'variation'		 => 'italic',
//									'size'			 => 14,
									'line-height'	 => 15,
									'letter-spacing' => 0,
									'color'			 => '#252a37'
								),
								'components' => array(
									'family'		 => true,
									'style'			 => true,
									'weight'		 => true,
									'size'			 => false,
									'line-height'	 => false,
									'letter-spacing' => false,
									'color'			 => false
								),
								'label'		 => esc_html__( 'Extra Fonts', 'bizipress' ),
								'desc'		 => esc_html__( 'This for Extra font load in google fonts. This is optional', 'bizipress' ),
							),
							'extra_fonts_2'	 => array(
								'type'		 => 'typography-v2',
								'value'		 => array(
									'family'		 => 'Asap',
									'style'			 => 'normal',
									'weight'		 => 500,
									'subset'		 => 'latin-ext',
									'variation'		 => 500,
//									'size'			 => 14,
									'line-height'	 => 15,
									'letter-spacing' => 0,
									'color'			 => '#252a37'
								),
								'components' => array(
									'family'		 => true,
									'style'			 => true,
									'weight'		 => true,
									'size'			 => false,
									'line-height'	 => false,
									'letter-spacing' => false,
									'color'			 => false
								),
								'label'		 => esc_html__( 'Extra Fonts 2', 'bizipress' ),
								'desc'		 => esc_html__( 'This for Extra font load in google fonts. This is optional', 'bizipress' ),
							),
						),
					),
				)
			),
			'css-box'			 => array(
				'title'	 => esc_html__( 'EXTRA CSS', 'bizipress' ),
				'type'	 => 'box',
				'attr'	 => array( 'class' => 'initialized' ),
				'options' => array(
					'custom_css' => array(
						'label'	 => esc_html__( 'Custom CSS', 'bizipress' ),
						'desc'	 => esc_html__( 'Custom Css changes that will be applied to the theme', 'bizipress' ),
						'help'	 => esc_html__( 'If you need to change major portions of the theme please add your custom CSS in the style.css file. This file is located on your server in the <strong>/child-theme/style.css</strong>', 'bizipress' ),
						'type'	 => 'textarea',
						'value'	 => '',
					),
				)
			),
		),
	),
);
