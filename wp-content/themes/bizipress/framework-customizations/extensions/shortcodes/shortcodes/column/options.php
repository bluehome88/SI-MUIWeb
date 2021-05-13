<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$margin_and_padding_group = array(
	'padding_group'	 => array(
		'type'		 => 'group',
		'options'	 => array(
			'html_label'	 => array(
				'type'	 => 'html',
				'value'	 => '',
				'label'	 => esc_html__( 'Inner Spacing', 'bizipress' ),
				'html'	 => '',
			),
			'padding_top'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'top', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
			'padding_right'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'right', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
			'padding_bottom' => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'bottom', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
			'padding_left'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'left', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
		)
	),
	'margin_group'	 => array(
		'type'		 => 'group',
		'options'	 => array(
			'html_label'	 => array(
				'type'	 => 'html',
				'value'	 => '',
				'label'	 => esc_html__( 'Outer Spacing', 'bizipress' ),
				'html'	 => '',
			),
			'margin_top'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'top', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
				'label'	 => false,
			),
			'margin_right'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'right', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
			'margin_bottom'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'bottom', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
			'margin_left'	 => array(
				'label'	 => false,
				'desc'	 => esc_html__( 'left', 'bizipress' ),
				'type'	 => 'short-text',
				'value'	 => '0',
			),
		),
	),
);

$text_align	 = array(
	'txt_align' => array(
		'label'		 => esc_html__( 'Text Alignment', 'bizipress' ),
		'desc'		 => esc_html__( 'Select the alignment for your column', 'bizipress' ),
		'attr'		 => array( 'class' => 'fw-checkbox-float-left' ),
		'type'		 => 'radio',
		'choices'	 => array(
			'none'			 => esc_html__( 'None', 'bizipress' ),
			'text-left'		 => esc_html__( 'Left', 'bizipress' ),
			'text-center'	 => esc_html__( 'Center', 'bizipress' ),
			'text-right'	 => esc_html__( 'Right', 'bizipress' ),
		),
		'value'		 => 'none'
	),
);
$height		 = array(
	'height' => array(
		'label'		 => esc_html__( 'Height', 'bizipress' ),
		'type'		 => 'radio-text',
		'value'		 => 'auto',
		'choices'	 => array(
			'auto' => esc_html__( 'auto', 'bizipress' ),
		),
		'custom'	 => 'custom_height',
		'help'		 => esc_html__( 'This option to use your custom height to like just add 500 ', 'bizipress' ),
	)
);


$options = array(
	'column-options'		 => array(
		'title'		 => esc_html__( 'General', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'xs_id'				 => array(
				'type'	 => 'unique',
				'length' => 8
			),
			'default_padding'	 => array(
				'type'			 => 'switch',
				'label'			 => esc_html__( 'Default Spacing', 'bizipress' ),
				'desc'			 => esc_html__( 'Use default left and right spacing?', 'bizipress' ),
				'help'			 => esc_html__( 'Default left and right spacings are set to 15px', 'bizipress' ),
				'attr'			 => array( 'class' => 'xs_column' ),
				'value'			 => '',
				'right-choice'	 => array(
					'value'	 => '',
					'label'	 => esc_html__( 'Yes', 'bizipress' ),
				),
				'left-choice'	 => array(
					'value'	 => 'xs-col-no-padding',
					'label'	 => esc_html__( 'No', 'bizipress' ),
				),
			),
			$margin_and_padding_group,
			$height,
			'txtcolor'			 => array(
				'label'	 => esc_html__( 'Text Color', 'bizipress' ),
				'type'	 => 'color-picker',
				'desc'	 => 'Change text color in this column.  Note some times its not work for default color',
			),
			$text_align,
		)
	),
	'column_style'			 => array(
		'title'		 => esc_html__( 'Style', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'background_options' => array(
				'type'			 => 'multi-picker',
				'label'			 => false,
				'desc'			 => false,
				'attr'			 => array( 'class' => 'xs_column_background' ),
				'picker'		 => array(
					'background' => array(
						'label'		 => esc_html__( 'Background', 'bizipress' ),
						'desc'		 => esc_html__( 'Select the background for your column', 'bizipress' ),
						'attr'		 => array( 'class' => 'fw-checkbox-float-left' ),
						'type'		 => 'radio',
						'choices'	 => array(
							'none'		 => esc_html__( 'None', 'bizipress' ),
							'image'		 => esc_html__( 'Image', 'bizipress' ),
							'bgcolor'	 => esc_html__( 'Color', 'bizipress' ),
						),
						'value'		 => 'none'
					),
				),
				'choices'		 => array(
					'none'		 => array(),
					'color'		 => array(
						'background_color' => array(
							'label'	 => '',
							'desc'	 => esc_html__( 'Select the background color', 'bizipress' ),

							'type'	 => 'color-picker'
						),
					),
					'image'		 => array(
						'background_image'		 => array(
							'label'	 =>  '',

							'type'	 => 'background-image',
						),
						'image_position_group'	 => array(
							'type'		 => 'group',
							'options'	 => array(
								'html_label'	 => array(
									'type'	 => 'html',
									'label'	 => esc_html__( 'Position', 'bizipress' ),
									'html'	 => '',
								),
								'repeat'		 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'Repeat', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										'no-repeat'	 => esc_html__( 'No-Repeat', 'bizipress' ),
										'repeat'	 => esc_html__( 'Repeat', 'bizipress' ),
										'repeat-x'	 => esc_html__( 'Repeat-X', 'bizipress' ),
										'repeat-y'	 => esc_html__( 'Repeat-Y', 'bizipress' ),
									)
								),
								'bg_position_x'	 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'horizontal position', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										'left'	 => esc_html__( 'Left', 'bizipress' ),
										'center' => esc_html__( 'Center', 'bizipress' ),
										'right'	 => esc_html__( 'Right', 'bizipress' ),
									),
									'value'		 => 'center',
								),
								'bg_position_y'	 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'Vertical position', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										'top'	 => esc_html__( 'Top', 'bizipress' ),
										'center' => esc_html__( 'Center', 'bizipress' ),
										'bottom' => esc_html__( 'Bottom', 'bizipress' ),
									),
									'value'		 => 'center',
								),
								'bg_size'		 => array(
									'label'		 => false,
									'help'		 => bizipress_kses( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'bizipress' ),
									'desc'		 => esc_html__( 'Bg Size', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										'auto'		 => esc_html__( 'Auto', 'bizipress' ),
										'cover'		 => esc_html__( 'Cover', 'bizipress' ),
										'contain'	 => esc_html__( 'Contain', 'bizipress' ),
									)
								),
							)
						),
						'overlay_options'		 => array(
							'type'		 => 'multi-picker',
							'label'		 => false,
							'desc'		 => false,
							'picker'	 => array(
								'overlay' => array(
									'type'			 => 'switch',
									'label'			 => esc_html__( 'Image Overlay', 'bizipress' ),
									'desc'			 => esc_html__( 'Enable image overlay color?', 'bizipress' ),
									'value'			 => 'no',
									'right-choice'	 => array(
										'value'	 => 'yes',
										'label'	 => esc_html__( 'Yes', 'bizipress' ),
									),
									'left-choice'	 => array(
										'value'	 => 'no',
										'label'	 => esc_html__( 'No', 'bizipress' ),
									),
								),
							),
							'choices'	 => array(
								'no'	 => array(),
								'yes'	 => array(
									'background' => array(
										'label'	 =>  '',

										'desc'	 => esc_html__( 'Select the overlay color', 'bizipress' ),
										'type'	 => 'rgba-color-picker',
										'value'	 => 'rgba(0,0,0,0.30)'
									),
								),
							),
						),
					),
					'bgcolor'	 => array(
						'background_color' => array(
							'label'	 =>  '',
							'desc'	 => esc_html__( 'Select the background color', 'bizipress' ),
							'type'	 => 'color-picker'
						),
					)
				),
				'show_borders'	 => false,
			),
			'animation'			 => array(
				'type'			 => 'switch',
				'label'			 => esc_html__( 'Animation Effect', 'bizipress' ),
				'desc'			 => esc_html__( 'Enable column animation effect?', 'bizipress' ),
				'value'			 => 'no',
				'right-choice'	 => array(
					'value'	 => 'yes',
					'label'	 => esc_html__( 'Yes', 'bizipress' ),
				),
				'left-choice'	 => array(
					'value'	 => 'no',
					'label'	 => esc_html__( 'No', 'bizipress' ),
				),
			),
			'column_border'		 => array(
				'type'		 => 'multi-picker',
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'no',
						'label'			 => esc_html__( 'Border', 'bizipress' ),
						'desc'			 => esc_html__( 'Want to add border this column ?', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes' => array(
						'border_option' => array(
							'type'		 => 'group',
							'options'	 => array(
								'html_label'	 => array(
									'type'	 => 'html',
									'value'	 => '',
									'label'	 => esc_html__( 'Border Option', 'bizipress' ),
									'html'	 => '',
								),
								'border'		 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'Border', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										'border'		 => esc_html__( 'border', 'bizipress' ),
										'border-top'	 => esc_html__( 'border-top', 'bizipress' ),
										'border-right'	 => esc_html__( 'border-right', 'bizipress' ),
										'border-bottom'	 => esc_html__( 'border-bottom', 'bizipress' ),
										'border-left'	 => esc_html__( 'border-left', 'bizipress' ),
									),
								),
								'border_size'	 => array(
									'label'	 => false,
									'desc'	 => esc_html__( 'Size', 'bizipress' ),
									'type'	 => 'short-text',
									'help'	 => esc_html__( 'Border size in pixels. NO need to add "px"', 'bizipress' ),
									'value'	 => '1',
								),
								'border_style'	 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'Style', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										'solid'	 => esc_html__( 'solid', 'bizipress' ),
										'dotted' => esc_html__( 'dotted', 'bizipress' ),
										'dashed' => esc_html__( 'dashed', 'bizipress' ),
										'double' => esc_html__( 'double', 'bizipress' ),
									),
								),
								'border_color'	 => array(
									'label'	 => false,
									'desc'	 => esc_html__( 'Color', 'bizipress' ),
									'help'	 => esc_html__( 'Select border color', 'bizipress' ),
									'type'	 => 'color-picker'
								),
							)
						),
					)
				)
			),
			'column_radius'		 => array(
				'type'		 => 'multi-picker',
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'no',
						'label'			 => esc_html__( 'Border Radius', 'bizipress' ),
						'desc'			 => esc_html__( 'Want to add border Radius this column ?', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes' => array(
						'border_option' => array(
							'type'		 => 'group',
							'options'	 => array(
								'html_label'	 => array(
									'type'	 => 'html',
									'value'	 => '',
									'label'	 => esc_html__( 'Radius', 'bizipress' ),
									'html'	 => '',
								),
								'top_left'		 => array(
									'label'	 => false,
									'desc'	 => esc_html__( 'Top Left', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '5',
								),
								'top_right'		 => array(
									'label'	 => false,
									'desc'	 => esc_html__( 'Top Right', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '5',
								),
								'bottom_right'	 => array(
									'label'	 => false,
									'desc'	 => esc_html__( 'Bottom Right', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '5',
								),
								'bottom_left'	 => array(
									'label'	 => false,
									'desc'	 => esc_html__( 'Bottom Left', 'bizipress' ),
									'type'	 => 'short-text',
//									'help'	 => esc_html__( 'Border Radius  will be like ', 'bizipress' ),
									'value'	 => '5',
								),
							)
						),
					)
				)
			),
			'column_shadow'		 => array(
				'type'		 => 'multi-picker',
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => '',
						'label'			 => esc_html__( 'Shadow', 'bizipress' ),
						'desc'			 => esc_html__( 'Want to Add a shadow?', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes' => array(
						'shadow_option' => array(
							'type'		 => 'group',
							'options'	 => array(
								'html_label'		 => array(
									'type'	 => 'html',
									'value'	 => '',
									'label'	 => esc_html__( 'Shadow Option', 'bizipress' ),
									'html'	 => '',
								),
								'shadow_horiontal'	 => array(
									'desc'	 => esc_html__( 'Horizontal', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '10',
									'label'	 => false,
								),
								'shadow_vertical'	 => array(
									'desc'	 => esc_html__( 'Vertical', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '10',
									'label'	 => false,
								),
								'shadow_blur'		 => array(
									'desc'	 => esc_html__( 'Blur distance', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '5',
									'label'	 => false,
								),
								'shadow_size'		 => array(
									'desc'	 => esc_html__( 'Size of shadow', 'bizipress' ),
									'type'	 => 'short-text',
									'value'	 => '10',
									'label'	 => false,
								),
								'shadow_color'		 => array(
									'desc'	 => esc_html__( 'Color', 'bizipress' ),
									'type'	 => 'rgba-color-picker',
									'value'	 => '#e30707',
									'label'	 => false,
								),
							)
						),
					)
				)
			),
		)
	),
	'advanced'				 => array(
		'title'		 => esc_html__( 'Advanced', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'column_offset'			 => array(
				'type'				 => 'fw-multi-inline',
				'label'				 => esc_html__( 'Column Offset', 'bizipress' ),
				'desc'				 => esc_html__( 'Move columns to the right. Offset uses left padding to offset the Column.', 'bizipress' ),
				'help'				 => esc_html__( 'These classes increase the left margin of a column by * columns. For example, .fw-col-md-offset-4 moves .fw-col-md-4 over four columns.', 'bizipress' ),
				'attr'				 => array( 'class' => 'xs_responsive_column_offset' ),
				'value'				 => array(
					'md_offset'	 => '',
					'sm_offset'	 => '',
				),
				'fw_multi_options'	 => array(
					'md_offset'	 => array(
						'title'		 => esc_html__( 'Large Device md', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''					 => esc_html__( 'Default', 'bizipress' ),
							'fw-col-md-offset-1' => esc_html__( 'moves 1 column', 'bizipress' ),
							'fw-col-md-offset-2' => esc_html__( 'moves 2 column', 'bizipress' ),
							'fw-col-md-offset-3' => esc_html__( 'moves 3 column', 'bizipress' ),
							'fw-col-md-offset-4' => esc_html__( 'moves 4 column', 'bizipress' ),
							'fw-col-md-offset-5' => esc_html__( 'moves 5 column', 'bizipress' ),
							'fw-col-md-offset-6' => esc_html__( 'moves 6 column', 'bizipress' ),
						)
					),
					'sm_offset'	 => array(
						'title'		 => esc_html__( 'Small Device sm', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''					 => esc_html__( 'Default', 'bizipress' ),
							'fw-col-sm-offset-1' => esc_html__( 'moves 1 column', 'bizipress' ),
							'fw-col-sm-offset-2' => esc_html__( 'moves 2 column', 'bizipress' ),
							'fw-col-sm-offset-3' => esc_html__( 'moves 3 column', 'bizipress' ),
							'fw-col-sm-offset-4' => esc_html__( 'moves 4 column', 'bizipress' ),
							'fw-col-sm-offset-5' => esc_html__( 'moves 5 column', 'bizipress' ),
							'fw-col-sm-offset-6' => esc_html__( 'moves 6 column', 'bizipress' ),
						)
					),
				)
			),
			'column_element'		 => array(
				'type'		 => 'group',
				'options'	 => array(
					'html_label' => array(
						'type'	 => 'html',
						'value'	 => '',
						'label'	 => esc_html__( 'Element Style', 'bizipress' ),
						'html'	 => '',
					),
					'display'	 => array(
						'desc'		 => esc_html__( 'Display', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''				 => esc_html__( '', 'bizipress' ),
							//'none'			 => esc_html__( 'None', 'bizipress' ), //
							'block'			 => esc_html__( 'Block', 'bizipress' ),
							'inline-block'	 => esc_html__( 'inline-block', 'bizipress' ),
							'inline'		 => esc_html__( 'inline', 'bizipress' ),
						),
						'value'		 => '',
						'label'		 => false,
					),
					'overflow'	 => array(
						'desc'		 => esc_html__( 'Overflow', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''			 => esc_html__( '', 'bizipress' ),
							'hidden'	 => esc_html__( 'hidden', 'bizipress' ),
							'scroll'	 => esc_html__( 'scroll', 'bizipress' ),
							'visible'	 => esc_html__( 'visible', 'bizipress' ),
							'auto'		 => esc_html__( 'auto', 'bizipress' ),
						),
						'value'		 => '',
						'label'		 => false,
					),
					'overflow-x' => array(
						'desc'		 => esc_html__( 'Overflow-X', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''			 => esc_html__( '', 'bizipress' ),
							'hidden'	 => esc_html__( 'hidden', 'bizipress' ),
							'scroll'	 => esc_html__( 'scroll', 'bizipress' ),
							'visible'	 => esc_html__( 'visible', 'bizipress' ),
							'auto'		 => esc_html__( 'auto', 'bizipress' ),
						),
						'value'		 => '',
						'label'		 => false,
					),
					'overflow-y' => array(
						'desc'		 => esc_html__( 'Overflow-Y', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''			 => esc_html__( '', 'bizipress' ),
							'hidden'	 => esc_html__( 'hidden', 'bizipress' ),
							'scroll'	 => esc_html__( 'scroll', 'bizipress' ),
							'visible'	 => esc_html__( 'visible', 'bizipress' ),
							'auto'		 => esc_html__( 'auto', 'bizipress' ),
						),
						'value'		 => '',
						'label'		 => false,
					),
					'z-index'	 => array(
						'desc'	 => esc_html__( 'Z-index', 'bizipress' ),
						'type'	 => 'short-text',
						'value'	 => '',
						'label'	 => false,
					),
				)
			),
			'last_column'			 => array(
				'type'		 => 'group',
				'attr'		 => array( 'class' => 'xs-group' ),
				'options'	 => array(
					'html_label'				 => array(
						'type'	 => 'html',
						'value'	 => '',
						'label'	 => esc_html__( 'Last Column', 'bizipress' ),
						'html'	 => '',
					),
					'last_column_large_device'	 => array(
						'label'		 => false,
						'desc'		 => esc_html__( 'Large Device md', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							'no'	 => esc_html__( 'no', 'bizipress' ),
							'yes'	 => esc_html__( 'yes', 'bizipress' ),
						),
					),
					'last_column_small_device'	 => array(
						'desc'		 => esc_html__( 'Small Device sm', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							'no'	 => esc_html__( 'no', 'bizipress' ),
							'yes'	 => esc_html__( 'yes', 'bizipress' ),
						),
						'help'		 => esc_html__( 'Last column will apply "clearfix" after this Column to reset the floating. So the next Column after this one will be pushed onto a new line.', 'bizipress' ),
						'label'		 => false,
					),
				)
			),
			'xs_column_pull_push'	 => array(
				'type'		 => 'multi-picker',
				'attr'		 => array( 'class' => 'xs_column_pull_pushoption' ),
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'no',
						'label'			 => esc_html__( 'Push Pull', 'bizipress' ),
						'desc'			 => esc_html__( 'Easily change the order of our built-in grid columns with .fw-col-md-push-* and .fw-col-md-pull-* modifier classes. <b>Do NOT change</b> if you dont have idea about this', 'bizipress' ),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes'	 => array(
						'column_push'	 => array(
							'type'				 => 'fw-multi-inline',
							'label'				 => esc_html__( 'Column Push Right', 'bizipress' ),
							'desc'				 => esc_html__( 'Column Push allows you to change the order of your Columns left column to right column for different breakpoints.', 'bizipress' ),
							'help'				 => esc_html__( 'Easily change the order of our built-in grid columns with .col-md-push-* and .col-md-pull-* modifier classes.', 'bizipress' ),
							'attr'				 => array( 'class' => 'xs_responsive_column_offset' ),
							'value'				 => array(
								'column_md_push' => '',
								'column_sm_push' => '',
							),
							'fw_multi_options'	 => array(
								'column_md_push' => array(
									'title'		 => esc_html__( 'Large Device md', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										''					 => esc_html__( 'Default', 'bizipress' ),
										'fw-col-md-push-1'	 => esc_html__( 'Push 1 column', 'bizipress' ),
										'fw-col-md-push-2'	 => esc_html__( 'Push 2 column', 'bizipress' ),
										'fw-col-md-push-3'	 => esc_html__( 'Push 3 column', 'bizipress' ),
										'fw-col-md-push-4'	 => esc_html__( 'Push 4 column', 'bizipress' ),
										'fw-col-md-push-5'	 => esc_html__( 'Push 5 column', 'bizipress' ),
										'fw-col-md-push-6'	 => esc_html__( 'Push 6 column', 'bizipress' ),
										'fw-col-md-push-7'	 => esc_html__( 'Push 7 column', 'bizipress' ),
										'fw-col-md-push-8'	 => esc_html__( 'Push 8 column', 'bizipress' ),
									)
								),
								'column_sm_push' => array(
									'title'		 => esc_html__( 'Small Device sm', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										''					 => esc_html__( 'Default', 'bizipress' ),
										'fw-col-sm-push-1'	 => esc_html__( 'Push 1 column', 'bizipress' ),
										'fw-col-sm-push-2'	 => esc_html__( 'Push 2 column', 'bizipress' ),
										'fw-col-sm-push-3'	 => esc_html__( 'Push 3 column', 'bizipress' ),
										'fw-col-sm-push-4'	 => esc_html__( 'Push 4 column', 'bizipress' ),
										'fw-col-sm-push-5'	 => esc_html__( 'Push 5 column', 'bizipress' ),
										'fw-col-sm-push-6'	 => esc_html__( 'Push 6 column', 'bizipress' ),
										'fw-col-sm-push-7'	 => esc_html__( 'Push 7 column', 'bizipress' ),
										'fw-col-sm-push-8'	 => esc_html__( 'Push 8 column', 'bizipress' ),
									)
								),
							)
						),
						'column_pull'	 => array(
							'type'				 => 'fw-multi-inline',
							'label'				 => esc_html__( 'Column Pull Left', 'bizipress' ),
							'desc'				 => esc_html__( 'Column Pull allows you to change the order of your right Column to left for different breakpoints.', 'bizipress' ),
							'help'				 => esc_html__( 'Easily change the order of our built-in grid columns with .col-md-push-* and .col-md-pull-* modifier classes.', 'bizipress' ),
							'attr'				 => array( 'class' => 'xs_responsive_column_offset' ),
							'value'				 => array(
								'column_md_pull' => '',
								'column_sm_pull' => '',
							),
							'fw_multi_options'	 => array(
								'column_md_pull' => array(
									'title'		 => esc_html__( 'Large Device md', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										''					 => esc_html__( 'Default', 'bizipress' ),
										'fw-col-md-pull-1'	 => esc_html__( 'Pull 1 column', 'bizipress' ),
										'fw-col-md-pull-2'	 => esc_html__( 'Pull 2 column', 'bizipress' ),
										'fw-col-md-pull-3'	 => esc_html__( 'Pull 3 column', 'bizipress' ),
										'fw-col-md-pull-4'	 => esc_html__( 'Pull 4 column', 'bizipress' ),
										'fw-col-md-pull-5'	 => esc_html__( 'Pull 5 column', 'bizipress' ),
										'fw-col-md-pull-6'	 => esc_html__( 'Pull 6 column', 'bizipress' ),
										'fw-col-md-pull-7'	 => esc_html__( 'Pull 7 column', 'bizipress' ),
										'fw-col-md-pull-8'	 => esc_html__( 'Pull 8 column', 'bizipress' ),
									)
								),
								'column_sm_pull' => array(
									'title'		 => esc_html__( 'Small Device sm', 'bizipress' ),
									'type'		 => 'select',
									'choices'	 => array(
										''					 => esc_html__( 'Default', 'bizipress' ),
										'fw-col-sm-pull-1'	 => esc_html__( 'Pull 1 column', 'bizipress' ),
										'fw-col-sm-pull-2'	 => esc_html__( 'Pull 2 column', 'bizipress' ),
										'fw-col-sm-pull-3'	 => esc_html__( 'Pull 3 column', 'bizipress' ),
										'fw-col-sm-pull-4'	 => esc_html__( 'Pull 4 column', 'bizipress' ),
										'fw-col-sm-pull-5'	 => esc_html__( 'Pull 5 column', 'bizipress' ),
										'fw-col-sm-pull-6'	 => esc_html__( 'Pull 6 column', 'bizipress' ),
										'fw-col-sm-pull-7'	 => esc_html__( 'Pull 7 column', 'bizipress' ),
										'fw-col-sm-pull-8'	 => esc_html__( 'Pull 8 column', 'bizipress' ),
									)
								),
							)
						),
					),
					'no'	 => array(),
				)
			),
			'info'					 => array(
				'type'	 => 'html',
				'label'	 => false,
				'html'	 => 'More detailed information about the Bootstrap Grid can be <a href="http://getbootstrap.com/css/#grid" target="_blank">found here</a>'
			),
		)
	),
	'xs_responsive_options'	 => array(
		'title'		 => esc_html__( 'Responsive', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'responsive_layout'	 => array(
				'type'				 => 'fw-multi-inline',
				'label'				 => esc_html__( 'Responsive Layout', 'bizipress' ),
				'desc'				 => esc_html__( 'Choose the responsive tablet and phone display for this column.', 'bizipress' ),
				'help'				 => esc_html__( 'Use this option in order to control how this column behaves on tablets (and devices with the resoution between 768px - 990px for tablet, and less than 768px for mobile ). Note that on phones all the columns are 1/1 by default.', 'bizipress' ),
				'attr'				 => array( 'class' => 'xs_responsive_layout_postion' ),
				'value'				 => array(
					'desktop'	 => '',
					'tablet'	 => '',
					'phonexs'	 => 'fw-col-xs-12',
				),
				'fw_multi_options'	 => array(
					'desktop'	 => array(
						'title'		 => esc_html__( 'For Large Device', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''				 => esc_html__( 'Default layout', 'bizipress' ),
							'fw-col-lg-2'	 => esc_html__( 'Make it a 1/6', 'bizipress' ),
							'fw-col-lg-3'	 => esc_html__( 'Make it a 1/4', 'bizipress' ),
							'fw-col-lg-4'	 => esc_html__( 'Make it a 1/3', 'bizipress' ),
							'fw-col-lg-6'	 => esc_html__( 'Make it a 1/2', 'bizipress' ),
							'fw-col-lg-8'	 => esc_html__( 'Make it a 2/3', 'bizipress' ),
							'fw-col-lg-9'	 => esc_html__( 'Make it a 3/4', 'bizipress' ),
							'fw-col-lg-12'	 => esc_html__( 'Make it a 1/1', 'bizipress' ),
						)
					),
					'tablet'	 => array(
						'title'		 => esc_html__( 'For Tablet', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							''				 => esc_html__( 'Default layout', 'bizipress' ),
							'fw-col-sm-2'	 => esc_html__( 'Make it a 1/6', 'bizipress' ),
							'fw-col-sm-3'	 => esc_html__( 'Make it a 1/4', 'bizipress' ),
							'fw-col-sm-4'	 => esc_html__( 'Make it a 1/3', 'bizipress' ),
							'fw-col-sm-6'	 => esc_html__( 'Make it a 1/2', 'bizipress' ),
							'fw-col-sm-8'	 => esc_html__( 'Make it a 2/3', 'bizipress' ),
							'fw-col-sm-9'	 => esc_html__( 'Make it a 3/4', 'bizipress' ),
							'fw-col-sm-12'	 => esc_html__( 'Make it a 1/1', 'bizipress' ),
						)
					),
					'phonexs'	 => array(
						'title'		 => esc_html__( 'For Phones', 'bizipress' ),
						'type'		 => 'select',
						'choices'	 => array(
							'fw-col-xs-2'	 => esc_html__( 'Make it a 1/6', 'bizipress' ),
							'fw-col-xs-3'	 => esc_html__( 'Make it a 1/4', 'bizipress' ),
							'fw-col-xs-4'	 => esc_html__( 'Make it a 1/3', 'bizipress' ),
							'fw-col-xs-6'	 => esc_html__( 'Make it a 1/2', 'bizipress' ),
							'fw-col-xs-8'	 => esc_html__( 'Make it a 2/3', 'bizipress' ),
							'fw-col-xs-9'	 => esc_html__( 'Make it a 3/4', 'bizipress' ),
							'fw-col-xs-12'	 => esc_html__( 'Default 1/1', 'bizipress' ),
						)
					),
				)
			),
			'display_desktop'	 => array(
				'type'	 => 'multi-picker',
				'label'	 => false,
				'desc'	 => false,
				'picker' => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Desktop', 'bizipress' ),
						'desc'			 => esc_html__( 'Display this column on desktop?', 'bizipress' ),
						'help'			 => esc_html__( 'Applies to devices with the resolution higher then 1200px (desktops and laptops)', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
			),
			'display_medium'	 => array(
				'type'		 => 'multi-picker',
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Medium Device & Tablet Landscape', 'bizipress' ),
						'desc'			 => esc_html__( 'Display this column on tablet landscape?', 'bizipress' ),
						'help'			 => esc_html__( 'Applies to devices with the resolution between 992px - 1199px (Medium device and tablet landscape)', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes' => array(
						$margin_and_padding_group,
						'change_height' => array(
							'type'		 => 'multi-picker',
							'label'		 => false,
							'desc'		 => false,
							'picker'	 => array(
								'selected' => array(
									'type'			 => 'switch',
									'value'			 => 'no',
									'label'			 => esc_html__( 'Height', 'bizipress' ),
									'desc'			 => esc_html__( 'Change this column height medium device?', 'bizipress' ),
									'left-choice'	 => array(
										'value'	 => 'no',
										'label'	 => esc_html__( 'No', 'bizipress' ),
									),
									'right-choice'	 => array(
										'value'	 => 'yes',
										'label'	 => esc_html__( 'Yes', 'bizipress' ),
									)
								),
							),
							'choices'	 => array(
								'yes' => array(
									$height,
								),
							)
						),
						$text_align,
					),
				)
			),
			'display_tablet'	 => array(
				'type'		 => 'multi-picker',
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Tablet Portrait', 'bizipress' ),
						'desc'			 => esc_html__( 'Display this column on tablet portrait?', 'bizipress' ),
						'help'			 => esc_html__( 'Applies to devices with the resolution between 768px - 991px (tablet portrait)', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes' => array(
						$margin_and_padding_group,
						'change_height' => array(
							'type'			 => 'multi-picker',
							'label'			 => false,
							'desc'			 => false,
							'picker'		 => array(
								'selected' => array(
									'type'			 => 'switch',
									'value'			 => 'no',
									'label'			 => esc_html__( 'Height', 'bizipress' ),
									'desc'			 => esc_html__( 'Change this column height medium device?', 'bizipress' ),
									'left-choice'	 => array(
										'value'	 => 'no',
										'label'	 => esc_html__( 'No', 'bizipress' ),
									),
									'right-choice'	 => array(
										'value'	 => 'yes',
										'label'	 => esc_html__( 'Yes', 'bizipress' ),
									)
								),
							),
							'choices'		 => array(
								'yes' => array(
									$height,
								),
							),
							'show_borders'	 => false,
						),
						$text_align,
					),
				)
			),
			'display_phone'		 => array(
				'type'		 => 'multi-picker',
				'label'		 => false,
				'desc'		 => false,
				'picker'	 => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Smartphone', 'bizipress' ),
						'desc'			 => esc_html__( 'Display this column on smartphone?', 'bizipress' ),
						'help'			 => esc_html__( 'Applies to devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets)', 'bizipress' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						)
					),
				),
				'choices'	 => array(
					'yes' => array(
						$margin_and_padding_group,
						'change_height' => array(
							'type'		 => 'multi-picker',
							'label'		 => false,
							'desc'		 => false,
							'picker'	 => array(
								'selected' => array(
									'type'			 => 'switch',
									'value'			 => 'no',
									'label'			 => esc_html__( 'Height', 'bizipress' ),
									'desc'			 => esc_html__( 'Change this column height medium device?', 'bizipress' ),
									'left-choice'	 => array(
										'value'	 => 'no',
										'label'	 => esc_html__( 'No', 'bizipress' ),
									),
									'right-choice'	 => array(
										'value'	 => 'yes',
										'label'	 => esc_html__( 'Yes', 'bizipress' ),
									)
								),
							),
							'choices'	 => array(
								'yes' => array(
									$height,
								),
							)
						),
						$text_align,
					),
				)
			),
		)
	),
	'custom_css'			 => array(
		'title'		 => esc_html__( 'Custom Css', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'class'		 => array(
				'label'	 => esc_html__( 'Custom Class', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter custom CSS class', 'bizipress' ),
				'help'	 => esc_html__( 'You can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /bizipress-child/style.css', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => '',
			),
			'custom_id'	 => array(
				'label'	 => esc_html__( 'Custom ID', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter custom CSS ID', 'bizipress' ),
				'help'	 => esc_html__( 'You can use this options to add a Css ID and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /bizipress-child/style.css', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => '',
			),
		)
	),
);
