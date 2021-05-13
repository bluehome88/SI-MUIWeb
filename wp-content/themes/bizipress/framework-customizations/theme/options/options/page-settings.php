<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'page_settings' => array(
		'title'		 => esc_html__( 'Banner Settings', 'bizipress' ),
		'type'		 => 'tab',
		'options'	 => array(
			'header-page-box' => array(
				'title'		 => esc_html__( 'Banner Settings', 'bizipress' ),
				'type'		 => 'box',
				'options'	 => array(
					'global_header_image'	 => array(
						'label'	 => esc_html__( 'Page Header Image', 'bizipress' ),
						'desc'	 => esc_html__( 'Upload a Page header image', 'bizipress' ),
						'help'	 => esc_html__( 'This default header image will be used for all your Page.', 'bizipress' ),
						'type'	 => 'upload'
					),
					'global_header_title'	 => array(
						'type'	 => 'text',
						'label'	 => esc_html__( ' Header Title', 'bizipress' ),
						'value'	 => esc_html__( 'Bizipress', 'bizipress' ),
						'desc'	 => esc_html__( 'Add your portfolio hero title', 'bizipress' )
					),
					'breadcrumb'		 => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Breadcrumb', 'bizipress' ),
						'desc'			 => esc_html__( 'Are you want to disable  breadcrumb?', 'bizipress' ),
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
				)
			),
		),
	),
);
