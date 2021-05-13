<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'list_group' => array(
		'type'		 => 'group',
		'options'	 => array(
			'title'		 => array(
				'label'	 => esc_html__( 'List title', 'bizipress' ),
				'desc'	 => esc_html__( 'Enter an  classic item in Title', 'bizipress' ),
				'type'	 => 'text',
			),
			'list_items' => array(
				'type'				 => 'addable-popup',
				'label'				 => esc_html__( 'Classic Items', 'bizipress' ),
				'desc'				 => esc_html__( 'Add classic list items', 'bizipress' ),
				'add-button-text'	 => esc_html__( 'Add Classic list item', 'bizipress' ),
				'template'			 => '{{=name}}',
				'popup-options'		 => array(
					'name'		 => array(
						'label'	 => esc_html__( 'Name', 'bizipress' ),
						'desc'	 => esc_html__( 'Enter an item name', 'bizipress' ),
						'type'	 => 'text',
					),
					'details'	 => array(
						'label'	 => esc_html__( 'Details', 'bizipress' ),
						'desc'	 => esc_html__( 'Enter an item details', 'bizipress' ),
						'type'	 => 'text',
					),
				),
			),
		)
	),
	'class'		 => array(
		'label'	 => esc_html__( 'Custom Class', 'bizipress' ),
		'desc'	 => esc_html__( 'Enter custom CSS class', 'bizipress' ),
		'type'	 => 'text',
		'value'	 => '',
		'help'	 => esc_html__( 'You can use this class to further style this shortcode', 'bizipress' ),
	),
);
