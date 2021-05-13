<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );



return array(
	/**
	 * Array for demos
	 */
//	'demos'				 => array(
//		'dark-woocommerce'	 => array(
//			array(
//				'name'	 => esc_html__( 'WooCommerce', 'bizipress' ),
//				'slug'	 => 'woocommerce',
//			),
//		),
//		'white-woocommerce'	 => array(
//			array(
//				'name'	 => esc_html__( 'WooCommerce', 'bizipress' ),
//				'slug'	 => 'woocommerce',
//			),
//		),
//	),
	'plugins'			 => array(
		array(
			'name'		 => esc_html__( 'Unyson', 'bizipress' ),
			'slug'		 => 'unyson',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Bizipress Features', 'bizipress' ),
			'slug'		 => 'bizipress-features',
			'required'	 => true,
			'source'	 => esc_url( BIZIPRESS_REMOTE_CONTENT ) . '/bizipress-features.zip',
		),
		array(
			'name'		 => esc_html__( 'Contact Form 7', 'bizipress' ),
			'slug'		 => 'contact-form-7',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Smart Slider', 'bizipress' ),
			'slug'		 => 'nextend-smart-slider3-pro',
			'required'	 => true,
			'source'	 => esc_url( BIZIPRESS_REMOTE_CONTENT ) . '/nextend-smart-slider3-pro.zip',
		),
		array(
			'name'		 => esc_html__( 'MailChimp for WordPress', 'bizipress' ),
			'slug'		 => 'mailchimp-for-wp',
			'required'	 => true,
		),
	),
	'theme_id'			 => 'bizipress',
	'child_theme_source' => BIZIPRESS_REMOTE_CONTENT . '/bizipress-child.zip',
	'has_demo_content'	 => true
);
