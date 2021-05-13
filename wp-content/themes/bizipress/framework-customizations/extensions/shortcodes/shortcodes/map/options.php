<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode	 = fw_ext( 'shortcodes' )->get_shortcode( 'map' );
$options		 = array(
	'data_provider'		 => array(
		'type'			 => 'multi-picker',
		'label'			 => false,
		'desc'			 => false,
		'picker'		 => array(
			'population_method' => array(
				'label'		 => esc_html__( 'Population Method', 'bizipress' ),
				'desc'		 => esc_html__( 'Select map population method (Ex: events, custom)', 'bizipress' ),
				'type'		 => 'select',
				'choices'	 => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices'		 => $map_shortcode->_get_picker_choices(),
		'show_borders'	 => false,
	),
	'gmap-key'			 => array_merge(
	array(
		'label'	 => esc_html__( 'Google Maps API Key', 'bizipress' ),
		'desc'	 => sprintf(
		__( 'Create an application in %sGoogle Console%s and add the Key here.', 'bizipress' ), '<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">', '</a>'
		),
	), version_compare( fw()->manifest->get_version(), '2.5.7', '>=' ) ? array(
		'type' => 'gmap-key',
	) : array(
		'type'		 => 'text',
		'fw-storage' => array(
			'type'		 => 'wp-option',
			'wp_option'	 => 'fw-option-types:gmap-key',
		),
	)
	),
	'map_type'			 => array(
		'type'		 => 'select',
		'label'		 => esc_html__( 'Map Type', 'bizipress' ),
		'desc'		 => esc_html__( 'Select map type', 'bizipress' ),
		'choices'	 => array(
			'roadmap'	 => esc_html__( 'Roadmap', 'bizipress' ),
			'terrain'	 => esc_html__( 'Terrain', 'bizipress' ),
			'satellite'	 => esc_html__( 'Satellite', 'bizipress' ),
			'hybrid'	 => esc_html__( 'Hybrid', 'bizipress' )
		)
	),
	'map_height'		 => array(
		'label'	 => esc_html__( 'Map Height', 'bizipress' ),
		'desc'	 => esc_html__( 'Set map height (Ex: 300)', 'bizipress' ),
		'type'	 => 'text'
	),
	'map_zoom'			 => array(
		'type'		 => 'slider',
		'value'		 => 15,
		'properties' => array(
			'min'	 => 0,
			'max'	 => 21,
			'sep'	 => 1,
		),
		'label'		 => esc_html__( 'Map Zoom', 'bizipress' ),
		'desc'		 => esc_html__( 'Select map zoom', 'bizipress' ),
	),
	'map_style'			 => array(
		'label'	 => esc_html__( 'Map Style', 'bizipress' ),
		'desc'	 => esc_html__( 'Copy/Paste map styles from <a target="_blank" href="https://snazzymaps.com/explore">https://snazzymaps.com/</a>', 'bizipress' ),
		'type'	 => 'textarea',
	),
	'map_pin'         => array(
		'label' => esc_html__( 'Map Pin', 'bizipress' ),
		'desc'  => esc_html__( 'Upload a pin for your location(s) (64x64)', 'bizipress' ),
		'type'  => 'upload',
	),
	'disable_scrolling'	 => array(
		'type'			 => 'switch',
		'value'			 => false,
		'label'			 => esc_html__( 'Disable zoom on scroll', 'bizipress' ),
		'desc'			 => esc_html__( 'Prevent the map from zooming when scrolling until clicking on the map', 'bizipress' ),
		'left-choice'	 => array(
			'value'	 => false,
			'label'	 => esc_html__( 'Yes', 'bizipress' ),
		),
		'right-choice'	 => array(
			'value'	 => true,
			'label'	 => esc_html__( 'No', 'bizipress' ),
		),
	),
);
