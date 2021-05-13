<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'side' => array(
		'title'		 => esc_html__( 'Page Settings', 'bizipress' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'bizipress' ),
				'desc'	 => esc_html__( 'Add your Service hero title', 'bizipress' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( ' Banner Image', 'bizipress' ),
				'desc'	 => esc_html__( 'Upload a Page header image', 'bizipress' ),
				'help'	 => esc_html__( "This default header image will be used for all your Service.", 'bizipress' ),
				'type'	 => 'upload'
			),
			'overlay'		 => array(
				'type'		 => 'rgba-color-picker',
				'value'		 => '',
				// palette colors array
				'label'		 => esc_html__( 'Overlay', 'bizipress' ),
				'desc'		 => esc_html__( 'This is optional Overlay', 'bizipress' ),
			),
		),
	),
);
