<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'		 => esc_html__( 'General', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'general-box' => array(
				'title'		 => esc_html__( 'General Settings', 'bizipress' ),
				'type'		 => 'box',
				'options'	 => array(
					'menu_logo' => array(
						'label'	 => esc_html__( 'Menu Logo', 'bizipress' ),
						'desc'	 => esc_html__( 'Add your website menu logo', 'bizipress' ),
						'type'	 => 'upload',
					),
					'loader'	 => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Pre Loader', 'bizipress' ),
						'desc'			 => esc_html__( 'Are you interested to use preloader?', 'bizipress' ),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
					),
					'scrollup'	 => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Scrollup', 'bizipress' ),
						'desc'			 => esc_html__( 'Are you interested to use scrollup?', 'bizipress' ),
						'value'			 => 'yes',
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'bizipress' ),
						),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'bizipress' ),
						),
					),
					'smoothscroll'	 => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Use smoothscroll', 'bizipress' ),
						'desc'			 => esc_html__( 'Are you interested to use scrollup?', 'bizipress' ),
						'value'			 => 'yes',
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
		)
	)
);
