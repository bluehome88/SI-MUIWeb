<?php

if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$cfg = array(
	'page_builder' => array(
		'title'					 => esc_html__( 'Extra Space', 'bizipress' ),
		'description'			 => esc_html__( 'Add a Space', 'bizipress' ),
		'tab'					 => esc_html__( 'Content Elements', 'bizipress' ),
		'title_template'		 => 'Extra Space{{ if (o.height) { }} : <strong>{{= o.height}}</strong>{{ } }}',
		'popup_header_elements'	 => '<a class="xs-docs-link" target="_blank" href="http://xpeedstudio.net/documentation/seopress/seopress-documentation/#ExtraSpace"><span class="xs-docs-info dashicons dashicons-sos"></span>' . esc_html__( 'Go to Docs', 'bizipress' ) . '</a>',
	)
);
