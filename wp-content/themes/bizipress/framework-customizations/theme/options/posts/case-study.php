<?php if ( !defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
	'normal' => array(
		'title'		 => esc_html__( 'Extra Case Study Settings', 'bizipress' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'textarea',
				'label'	 => esc_html__( 'Banner title', 'bizipress' ),
				'desc'	 => esc_html__( 'Add your Service hero title', 'bizipress' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( ' Banner Image', 'bizipress' ),
				'desc'	 => esc_html__( 'Upload a Page header image', 'bizipress' ),
				'help'	 => esc_html__( "This default header image will be used for all your Service.", 'bizipress' ),
				'type'	 => 'upload'
			),
		
		),
	),
	'side' => array(
		'title'		 => esc_html__( 'Page Settings', 'bizipress' ),
		'type'		 => 'box',
		'priority'	 => 'default',
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
		
		),
	),

);
