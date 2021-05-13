<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'footer_settings' => array(
		'title'		 => esc_html__( 'Footer Settings', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'footer_box' => array(
				'title'		 => esc_html__( 'Footer Settings', 'bizipress' ),
				'type'		 => 'box',
				'options'	 => array(
					'footer_top'			 => array(
						'type'			 => 'multi-picker',
						'label'			 => false,
						'desc'			 => false,
						'picker'		 => array(
							'footer_top_part' => array(
								'label'			 => esc_html__( 'Footer top', 'bizipress' ),
								'desc'			 => esc_html__( 'Are you interested to use footer Top location?', 'bizipress' ),
								'type'			 => 'switch',
								'right-choice'	 => array(
									'value'	 => 'yes',
									'label'	 => esc_html__( 'Yes', 'bizipress' )
								),
								'left-choice'	 => array(
									'value'	 => 'no',
									'label'	 => esc_html__( 'No', 'bizipress' )
								),
								'value'			 => 'yes',
							)
						),
						'choices'		 => array(
							'yes'	 => array(
								'footer_styles' => array(
									'type'			 => 'multi-picker',
									'label'			 => false,
									'desc'			 => false,
									'picker'		 => array(
										'footer_style' => array(
											'label'			 => esc_html__( 'Footer style', 'bizipress' ),
											'desc'			 => esc_html__( 'Are you interested to use footer Top location?', 'bizipress' ),
											'type'			 => 'switch',
											'right-choice'	 => array(
												'value'	 => 'one',
												'label'	 => esc_html__( 'Style one', 'bizipress' )
											),
											'left-choice'	 => array(
												'value'	 => 'two',
												'label'	 => esc_html__( 'Style Two', 'bizipress' )
											),
											'value'			 => 'one',
										)
									),
									'choices'		 => array(
										'one'	 => array(
											'top_contact_details' => array(
												'type'				 => 'addable-popup',
												'add-button-text'	 => esc_html__( 'Add Contact Details', 'bizipress' ),
												'label'				 => esc_html__( 'Contact Details', 'bizipress' ),
												'desc'				 => esc_html__( 'Add contact information details items', 'bizipress' ),
												'limit'				 => 3,
												'template'			 => '{{=title}}',
												'popup-options'		 => array(
													'title'	 => array(
														'label'	 => esc_html__( 'Title', 'bizipress' ),
														'value'	 => esc_html__( 'Address', 'bizipress' ),
														'desc'	 => esc_html__( 'Enter the contact information title', 'bizipress' ),
														'type'	 => 'text',
													),
													'info'	 => array(
														'label'	 => esc_html__( 'Information', 'bizipress' ),
														'value'	 => esc_html__( '1877 Perry Street Swartz Creekson, MI 48473', 'bizipress' ),
														'desc'	 => esc_html__( 'Enter the main contact information', 'bizipress' ),
														'type'	 => 'text',
													),
													'icon'	 => array(
														'type'	 => 'new-icon',
														'label'	 => 'Icon',
													),
												),
												'value'				 => array(
													0	 => array(
														'title'	 => 'Head Office',
														'icon'	 => 'icon icon-map-marker2',
														'info'	 => '1010 Avenue, NY 90001, USA'
													),
													1	 => array(
														'title'	 => 'Call Us',
														'icon'	 => 'icon icon-phone3',
														'info'	 => '(+87) 847-291-4353'
													),
													2	 => array(
														'title'	 => 'Mail Us',
														'icon'	 => 'icon icon-envelope',
														'info'	 => 'info@example.com'
													),
												)
											),
										),
										'two'	 => array(
											'title'		 => array(
												'label'	 => esc_html__( 'Subscribe Title', 'bizipress' ),
												'value'	 => bizipress_kses( 'Subscribe to <span class="title-text-color">our newsletter</span>', 'bizipress' ),
												'desc'	 => esc_html__( 'Enter the top subscribe title', 'bizipress' ),
												'type'	 => 'text',
											),
											'desc'		 => array(
												'label'	 => esc_html__( 'subscribe info', 'bizipress' ),
												'value'	 => esc_html__( 'No spam message from us, only give you latest offer which is best for you and your business', 'bizipress' ),
												'desc'	 => esc_html__( 'Enter the subscribe info or subtitle', 'bizipress' ),
												'type'	 => 'text',
											),
											'shortcode'	 => array(
												'label'	 => esc_html__( 'Shortcode', 'bizipress' ),
												'value'	 => '[mc4wp_form id="1264"]',
												'desc'	 => sprintf( esc_html__( 'Genarate a shortcode from <a href="%s">Mailchimp for WP</a>. ', 'bizipress' ), admin_url( 'admin.php?page=mailchimp-for-wp-forms&view=edit-form' ) ),
												'type'	 => 'text',
											),
										),
									),
									'show_borders'	 => false,
								),
							),
							'no'	 => array(),
						),
						'show_borders'	 => false,
					),
					'footer_widget'			 => array(
						'type'			 => 'multi-picker',
						'label'			 => false,
						'desc'			 => false,
						'picker'		 => array(
							'footer_bg' => array(
								'label'			 => esc_html__( 'Footer Widget', 'bizipress' ),
								'desc'			 => esc_html__( 'Are you interested to use footer widget?', 'bizipress' ),
								'type'			 => 'switch',
								'right-choice'	 => array(
									'value'	 => 'yes',
									'label'	 => esc_html__( 'Yes', 'bizipress' )
								),
								'left-choice'	 => array(
									'value'	 => 'no',
									'label'	 => esc_html__( 'No', 'bizipress' )
								),
								'value'			 => 'yes',
							)
						),
						'choices'		 => array(
							'yes'	 => array(
								'widgets_count'		 => array(
									'type'		 => 'radio',
									'value'		 => '3',
									'label'		 => __( 'Widgets in footer', 'bizipress' ),
									'desc'		 => __( 'Hoe many widgets you would like to show in footer?', 'bizipress' ),
									'choices'	 => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
										'3'	 => __( '3', 'bizipress' ),
										'4'	 => __( '4', 'bizipress' ),
									),
									// Display choices inline instead of list
									'inline'	 => true,
								),
								'footer_bg_setting'	 => array(
									'type'			 => 'multi-picker',
									'label'			 => false,
									'desc'			 => false,
									'picker'		 => array(
										'footer_bg' => array(
											'label'			 => esc_html__( 'Background Style', 'bizipress' ),
											'desc'			 => esc_html__( 'Select your footer background style', 'bizipress' ),
											'type'			 => 'switch',
											'right-choice'	 => array(
												'value'	 => 'color',
												'label'	 => esc_html__( 'Color', 'bizipress' )
											),
											'left-choice'	 => array(
												'value'	 => 'image',
												'label'	 => esc_html__( 'Image', 'bizipress' )
											),
											'value'			 => 'no',
										)
									),
									'choices'		 => array(
										'color'	 => array(
											'bg_color' => array(
												'type'	 => 'color-picker',
												'value'	 => '#191919',
												'label'	 => '',
												'desc'	 => esc_html__( 'Select your footer background color.', 'bizipress' ),
											),
										),
										'image'	 => array(
											'bg_image'				 => array(
												'type'	 => 'upload',
												'label'	 => '',
												'desc'	 => esc_html__( 'Upload your footer background image.', 'bizipress' ),
											),
											'widgets_overlay_color'	 => array(
												'label'		 => esc_html__( 'overlay Color', 'bizipress' ),
												'type'		 => 'rgba-color-picker',
												'value'		 => 'rgba(0, 8, 29, 0.85)',
												'palettes'	 => array( '#ba4e4e', '#0ce9ed', '#941940' ),
												'desc'		 => esc_html__( 'Choose your footer widgets overlay color text color.', 'bizipress' ),
											),
										),
									),
									'show_borders'	 => false,
								),
								'widgets_text_color' => array(
									'label'	 => esc_html__( 'Text Color', 'bizipress' ),
									'type'	 => 'color-picker',
									'value'	 => '#ffffff',
									'desc'	 => esc_html__( 'Choose your footer widgets text color.', 'bizipress' ),
								),
							),
							'no'	 => array(),
						),
						'show_borders'	 => false,
					),
					'footer_copyright_box'	 => array(
						'title'		 => esc_html__( 'Footer bottom  Settings', 'bizipress' ),
						'type'		 => 'box',
						'options'	 => array(
							'footer_text_color'		 => array(
								'label'	 => esc_html__( 'Footer Text Color', 'bizipress' ),
								'type'	 => 'color-picker',
								'value'	 => '#ffffff',
								'desc'	 => esc_html__( 'Choose your footer copyright text color.', 'bizipress' ),
							),
							'footer_bg_color'		 => array(
								'label'	 => esc_html__( 'Footer Background Color', 'bizipress' ),
								'type'	 => 'color-picker',
								'value'	 => '#00081d',
								'desc'	 => esc_html__( 'Choose your footer copyright background color.', 'bizipress' ),
							),
							'copyright_style'		 => array(
								'type'			 => 'multi-picker',
								'label'			 => false,
								'desc'			 => false,
								'picker'		 => array(
									'main_footer_logo' => array(
										'label'			 => esc_html__( 'Copyright Style', 'bizipress' ),
										'desc'			 => esc_html__( 'Do you want to use footer logo?', 'bizipress' ),
										'type'			 => 'switch',
										'right-choice'	 => array(
											'value'	 => 'one',
											'label'	 => esc_html__( 'One', 'bizipress' )
										),
										'left-choice'	 => array(
											'value'	 => 'two',
											'label'	 => esc_html__( 'Two', 'bizipress' )
										),
										'value'			 => 'one',
									)
								),
								'choices'		 => array(
									'one'	 => array(
									),
									'two'	 => array(
										'footer_logo'	 => array(
											'type'	 => 'upload',
											'label'	 => '',
											'desc'	 => esc_html__( 'Upload your favorite footer logo.', 'bizipress' ),
										),
										'footer_text'	 => array(
											'label'	 => esc_html__( 'Footer Text', 'bizipress' ),
											'type'	 => 'textarea',
											'value'	 => esc_html__( 'Invest in your drivers, improve their safety and reduce the risk of incidents with our main comprehensive courses and seminars tailored to the needs of your organisation. With a choice of full or half-day sessions. all are flexible to fit with your schedules.', 'bizipress' ),
											'desc'	 => esc_html__( 'Footer center text', 'bizipress' ),
										),
										'footer_social'	 => array(
											'type'				 => 'addable-popup',
											'label'				 => esc_html__( 'Social Links', 'bizipress' ),
											'add-button-text'	 => esc_html__( 'Add Social Icon', 'bizipress' ),
											'desc'				 => esc_html__( 'Add your footer social icon.', 'bizipress' ),
											'template'			 => '{{=title}}',
											'popup-options'		 => array(
												'title'	 => array(
													'label'	 => esc_html__( 'Title', 'bizipress' ),
													'desc'	 => esc_html__( 'Enter a title (it is for internal use and will not appear on the front end)', 'bizipress' ),
													'type'	 => 'text',
													'value'	 => esc_html__( 'Facebook', 'bizipress' ),
												),
												'icon'	 => array(
													'type'	 => 'new-icon',
													'value'	 => esc_html__( 'fa-facebook', 'bizipress' ),
													'label'	 => esc_html__( 'Social Icon', 'bizipress' )
												),
												'link'	 => array(
													'label'	 => esc_html__( 'Link', 'bizipress' ),
													'desc'	 => wp_kses_post( 'Enter your social URL link ( dont forget to add <b>http://</b>)', 'bizipress' ),
													'type'	 => 'text',
													'value'	 => '#',
												)
											),
											'value'				 => array(
												0	 => array(
													'title'	 => 'Twitter',
													'icon'	 => 'fa fa-twitter',
													'link'	 => '#'
												),
												1	 => array(
													'title'	 => 'Facebook',
													'icon'	 => 'fa fa-facebook',
													'link'	 => '#'
												),
												2	 => array(
													'title'	 => 'instagram',
													'icon'	 => 'fa fa-instagram',
													'link'	 => '#'
												),
												3	 => array(
													'title'	 => 'g+',
													'icon'	 => 'fa fa-google-plus',
													'link'	 => '#'
												),
											)
										),
									),
								),
								'show_borders'	 => false,
							),
							'footer_copyright_text'	 => array(
								'label'	 => esc_html__( 'Copyright Text', 'bizipress' ),
								'type'	 => 'textarea',
								'value'	 => esc_html__( 'Copyright 2018 Craft. All Rights Reserved', 'bizipress' ),
								'desc'	 => esc_html__( 'Add footer copyright text in here.', 'bizipress' ),
							),
						),
					),
				),
			),
		),
	),
);
