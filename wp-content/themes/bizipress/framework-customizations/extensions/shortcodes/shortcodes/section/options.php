<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'genarel-options'		 => array(
		'title'		 => esc_html__( 'General', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'xs_id'			 => array(
				'type'	 => 'unique',
				'length' => 8
			),
			'section_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Sorting title', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end) ', 'bizipress' )
			),
			'is_fullwidth'	 => array(
				'label'	 => esc_html__( 'Full Width', 'bizipress' ),
				'type'	 => 'switch',
			),
			'padding_group'	 => array(
				'type'		 => 'group',
				'options'	 => array(
					'html_label'	 => array(
						'type'	 => 'html',
						'label'	 => esc_html__( 'Inner Spacing', 'bizipress' ),
						'html'	 => '',
					),
					'padding_top'	 => array(
						'label'	 => false,
						'desc'	 => esc_html__( 'top', 'bizipress' ),
						'type'	 => 'short-text',
						'value'	 => '100',
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
						'value'	 => '100',
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
			'height'		 => array(
				'label'		 => esc_html__( 'Height', 'bizipress' ),
				'desc'		 => bizipress_kses( "Select the section's height in px (Ex: 400) (dont include with <b>px</b>)", 'bizipress' ),
				'type'		 => 'radio-text',
				'value'		 => 'auto',
				'choices'	 => array(
					'auto'					 => esc_html__( 'auto', 'bizipress' ),
					'xs-section-height-sm'	 => esc_html__( 'small', 'bizipress' ),
					'xs-section-height-md'	 => esc_html__( 'medium', 'bizipress' ),
					'xs-section-height-lg'	 => esc_html__( 'large', 'bizipress' ),
				),
				'custom'	 => 'custom_width',
				'help'		 => esc_html__( 'This option to set extra height in your section. We have used three classes for extra height which small = 350px, medium= 450px , large = 650px. you can use your custom height to like just add 400 (no need to add px)', 'bizipress' ),
			),
		)
	),
	'style-options'			 => array(
		'title'		 => esc_html__( 'Styles', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'background_options' => array(
				'type'			 => 'multi-picker',
				'label'			 => false,
				'desc'			 => false,
				'picker'		 => array(
					'background' => array(
						'label'		 => esc_html__( 'Background', 'bizipress' ),
						'desc'		 => esc_html__( 'Select the background for your section', 'bizipress' ),
						'attr'		 => array( 'class' => 'fw-checkbox-float-left' ),
						'type'		 => 'radio',
						'choices'	 => array(
							'none'		 => esc_html__( 'None', 'bizipress' ),
							'image'		 => esc_html__( 'Image', 'bizipress' ),
							'video'		 => esc_html__( 'Video', 'bizipress' ),
							'color'		 => esc_html__( 'Color', 'bizipress' ),
							'gradient'	 => esc_html__( 'Gradient', 'bizipress' ),
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
					'gradient'	 => array(
						'background' => array(
							'type'	 => 'gradient',
							'value'	 => array(
								'primary'	 => '#33001b',
								'secondary'	 => '#ff0084',
							),
							'desc'	 => esc_html__( 'Add your Gradient color', 'bizipress' ),
						),
					),
					'image'		 => array(
						'background_image'		 => array(
							'label'	 => '',
							'type'	 => 'background-image',
						),
						'image_position_group'	 => array(
							'type'		 => 'group',
							'attr'		 => array( 'class' => 'xs-shortwidth-group' ),
							'options'	 => array(
								'html_label'			 => array(
									'type'	 => 'html',
									'label'	 => esc_html__( 'Position', 'bizipress' ),
									'html'	 => '',
								),
								'repeat'				 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'Repeat', 'bizipress' ),
									'type'		 => 'short-select',
									'choices'	 => array(
										'no-repeat'	 => esc_html__( 'No-Repeat', 'bizipress' ),
										'repeat'	 => esc_html__( 'Repeat', 'bizipress' ),
										'repeat-x'	 => esc_html__( 'Repeat-X', 'bizipress' ),
										'repeat-y'	 => esc_html__( 'Repeat-Y', 'bizipress' ),
									)
								),
								'bg_position_x'			 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'horizontal position', 'bizipress' ),
									'type'		 => 'short-select',
									'choices'	 => array(
										'left'	 => esc_html__( 'Left', 'bizipress' ),
										'center' => esc_html__( 'Center', 'bizipress' ),
										'right'	 => esc_html__( 'Right', 'bizipress' ),
									),
									'value'		 => 'center',
									'attr'		 => array( 'class' => 'xs-shortwidth' ),
								),
								'bg_position_y'			 => array(
									'label'		 => false,
									'desc'		 => esc_html__( 'Vertical position', 'bizipress' ),
									'type'		 => 'short-select',
									'choices'	 => array(
										'top'	 => esc_html__( 'Top', 'bizipress' ),
										'center' => esc_html__( 'Center', 'bizipress' ),
										'bottom' => esc_html__( 'Bottom', 'bizipress' ),
									),
									'value'		 => 'center',
									'attr'		 => array( 'class' => 'xs-shortwidth' ),
								),
								'bg_size'				 => array(
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
								'background_attachment'	 => array(
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
								'parallax'				 => array(
									'type'			 => 'switch',
									'label'			 => esc_html__( 'Text white', 'bizipress' ),
									'desc'			 => esc_html__( 'Enable parllax effect in this image?', 'bizipress' ),
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
						),
						'tab_item'				 => array(
							'type'			 => 'multi-picker',
							'label'			 => false,
							'desc'			 => false,
							'picker'		 => array(
								'selected_value' => array(
									'label'		 => esc_html__( 'Overlay', 'bizipress' ),
									'desc'		 => esc_html__( 'Select the tab type', 'bizipress' ),
									'attr'		 => array( 'class' => 'fw-checkbox-float-left' ),
									'value'		 => 'overlay11',
									'type'		 => 'radio',
									'choices'	 => array(
										'overlay11'	 => esc_html__( 'Overlay', 'bizipress' ),
										'gradient11' => esc_html__( 'Gradient', 'bizipress' ),
									),
								)
							),
							'choices'		 => array(
								'overlay11'	 => array(
									'background' => array(
										'label'	 => esc_html__( '', 'bizipress' ),
										'desc'	 => esc_html__( 'Select the overlay color', 'bizipress' ),
										'value'	 => 'rgba(0,0,0,0.35)',
										'type'	 => 'rgba-color-picker'
									),
								),
								'gradient11' => array(
									'background'			 => array(
										'type'	 => 'gradient',
										'value'	 => array(
											'primary'	 => '#33001b',
											'secondary'	 => '#ff0084',
										),
										'help'	 => esc_html__( 'Help tip', 'bizipress' ),
									),
									'gradient_trnsparent'	 => array(
										'type'		 => 'slider',
										'value'		 => 85,
										'properties' => array(
											'min'	 => 30,
											'max'	 => 90,
											'step'	 => 1, // Set slider step. Always > 0. Could be fractional.
										),
										'attr'		 => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
										'label'		 => esc_html__( ' ', 'bizipress' ),
										'desc'		 => esc_html__( 'Set your Gradient color', 'bizipress' ),
									)
								),
							),
							'show_borders'	 => false,
						),
					),
					'video'		 => array(
						'video_type'		 => array(
							'type'			 => 'multi-picker',
							'label'			 => false,
							'desc'			 => false,
							'attr'			 => array( 'class' => 'xs-video-background-image' ),
							'picker'		 => array(
								'select_video_xs' => array(
									'label'		 => esc_html__( 'Video Type', 'bizipress' ),
									'desc'		 => esc_html__( 'Select the video type', 'bizipress' ),
									'attr'		 => array( 'class' => 'fw-checkbox-float-left' ),
									'type'		 => 'radio',
									'choices'	 => array(
										'youtube'		 => esc_html__( 'Youtube', 'bizipress' ),
										'media_upload'	 => esc_html__( 'Upload', 'bizipress' ),
									),
									'value'		 => 'youtube'
								),
							),
							'choices'		 => array(
								'youtube'		 => array(
									'video'		 => array(
										'label'	 => esc_html__( '', 'bizipress' ),
										'desc'	 => esc_html__( 'Insert a YouTube video URL', 'bizipress' ),
										'type'	 => 'text',
									),
									'video_img'	 => array(
										'label'	 => esc_html__( 'Replacement Image', 'bizipress' ),
										'type'	 => 'background-image',
										'help'	 => esc_html__( 'This image will replace the video on mobile devices that disable background videos', 'bizipress' ),
									),
								),
								'media_upload'	 => array(
									'video'		 => array(
										'label'			 => esc_html__( '', 'bizipress' ),
										'desc'			 => esc_html__( 'Upload a video', 'bizipress' ),
										'images_only'	 => false,
										'type'			 => 'upload',
									),
									'video_img'	 => array(
										'label'	 => esc_html__( 'Alternate Image', 'bizipress' ),
										'type'	 => 'background-image',
										'help'	 => esc_html__( 'This image will replace the video on mobile devices that disable background videos', 'bizipress' ),
									),
								),
							),
							'show_borders'	 => false,
						),
						'overlay_options'	 => array(
							'type'		 => 'multi-picker',
							'label'		 => false,
							'desc'		 => false,
							'picker'	 => array(
								'overlay' => array(
									'type'			 => 'switch',
									'label'			 => esc_html__( 'Overlay Color', 'bizipress' ),
									'desc'			 => esc_html__( 'Enable video overlay color?', 'bizipress' ),
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
										'label'	 => esc_html__( '', 'bizipress' ),
										'desc'	 => esc_html__( 'Select the overlay color', 'bizipress' ),
										'value'	 => 'rgba(0,0,0,0.25)',
										'type'	 => 'rgba-color-picker'
									),
								),
							),
						),
					),
				),
				'show_borders'	 => false,
			),
			'section_element'	 => array(
				'type'		 => 'group',
				'attr'		 => array( 'class' => 'xs-group' ),
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
						'value'		 => 'hidden',
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
		),
	),
	'xs_responsive_options'	 => array(
		'title'		 => esc_html__( 'Responsive', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'display_desktop'	 => array(
				'type'	 => 'multi-picker',
				'label'	 => false,
				'desc'	 => false,
				'picker' => array(
					'selected' => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Desktop', 'bizipress' ),
						'desc'			 => esc_html__( 'Display this on desktop?', 'bizipress' ),
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
				'type'			 => 'switch',
				'value'			 => 'yes',
				'label'			 => esc_html__( 'Medium Device & Tablet Landscape', 'bizipress' ),
				'desc'			 => esc_html__( 'Display this  on tablet landscape?', 'bizipress' ),
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
			'display_tablet'	 => array(
				'type'			 => 'switch',
				'value'			 => 'yes',
				'label'			 => esc_html__( 'Tablet Portrait', 'bizipress' ),
				'desc'			 => esc_html__( 'Display this on tablet portrait?', 'bizipress' ),
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
			'display_phone'		 => array(
				'type'			 => 'switch',
				'value'			 => 'yes',
				'label'			 => esc_html__( 'Smartphone', 'bizipress' ),
				'desc'			 => esc_html__( 'Display this on smartphone?', 'bizipress' ),
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
		)
	),
	'custom-options'		 => array(
		'title'		 => esc_html__( 'Custom css', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'class'		 => array(
				'label'	 => esc_html__( 'CSS Class', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter custom CSS class', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => '',
			),
			'link_id'	 => array(
				'label'	 => esc_html__( 'CSS ID', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter custom CSS ID', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => '',
			),
		)
	),
);
