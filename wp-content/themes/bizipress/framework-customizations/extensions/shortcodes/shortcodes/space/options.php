<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory	 = get_template_directory_uri();
$options			 = array(
	'genarel-options'		 => array(
		'title'		 => esc_html__( 'Custom css', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'xs_id'	 => array(
				'type'	 => 'unique',
				'length' => 8
			),
			'height' => array(
				'label'		 => esc_html__( 'Height', 'bizipress' ),
				'desc'		 => esc_html__( 'Select the space height in px (Small = 30px, Medium = 60px, Large = 100px) also you can use custom height according to your need.', 'bizipress' ),
				'type'		 => 'radio-text',
				'choices'	 => array(
					'space-sm'	 => esc_html__( 'Small', 'bizipress' ),
					'space-md'	 => esc_html__( 'Medium', 'bizipress' ),
					'space-lg'	 => esc_html__( 'Large', 'bizipress' ),
				),
				'value'		 => 'space-md',
				'custom'	 => 'custom_height',
			),
		)
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
			'medium_height'		 => array(
				'label'		 => esc_html__( 'Medium Height', 'bizipress' ),
				'help'		 => esc_html__( 'Select the space height in px (Small = 30px, Medium = 60px, Large = 100px) also you can use custom height according to your need.', 'bizipress' ),
				'type'		 => 'radio-text',
				'choices'	 => array(
					'default' => esc_html__( 'Default', 'bizipress' ),
				),
				'value'		 => 'default',
				'custom'	 => 'custom_height',
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
			'tablet_height'		 => array(
				'label'		 => esc_html__( 'Tablet Height', 'bizipress' ),
				'help'		 => esc_html__( 'Select the space height in px (Small = 30px, Medium = 60px, Large = 100px) also you can use custom height according to your need.', 'bizipress' ),
				'type'		 => 'radio-text',
				'choices'	 => array(
					'default' => esc_html__( 'Default', 'bizipress' ),
				),
				'value'		 => 'default',
				'custom'	 => 'custom_height',
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
			'phone_height'		 => array(
				'label'		 => esc_html__( 'Phone Height', 'bizipress' ),
				'help'		 => esc_html__( 'Select the space height in px (Small = 30px, Medium = 60px, Large = 100px) also you can use custom height according to your need.', 'bizipress' ),
				'type'		 => 'radio-text',
				'choices'	 => array(
					'default' => esc_html__( 'Default', 'bizipress' ),
				),
				'value'		 => 'default',
				'custom'	 => 'custom_height',
			),
		)
	),
	'custom-options'		 => array(
		'title'		 => esc_html__( 'Custom css', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'class' => array(
				'label'	 => esc_html__( 'CSS Class', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter custom CSS class', 'bizipress' ),
				'type'	 => 'text',
				'value'	 => '',
			),
		)
	),
);
