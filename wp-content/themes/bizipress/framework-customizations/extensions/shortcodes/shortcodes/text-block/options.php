<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'genarel-options'		 => array(
		'title'		 => esc_html__( 'General', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'xs_id'	 => array(
				'type'	 => 'unique',
				'length' => 8
			),
			'text'	 => array(
				'type'	 => 'wp-editor',
				'label'	 => esc_html__( 'Content', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter some content for this texblock', 'bizipress' ),
				'attr'	 => array( 'class' => 'xs-wp-editor' ),
			),
		),
	),
	'xs_responsive_options'	 => array(
		'title'		 => esc_html__( 'Responsive', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'display_desktop'	 => array(
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
	'custom-css-options'	 => array(
		'title'		 => esc_html__( 'Custom Css', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'class' => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Custom Class', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter a custom CSS class', 'bizipress' ),
				'help'	 => esc_html__( 'You can use this class to further style this shortcode by adding your custom CSS.', 'bizipress' ),
			),
		),
	),
);
