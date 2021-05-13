<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 = esc_html__( 'BiziPress', 'bizipress' );
$manifest[ 'uri' ]			 = esc_url( 'http://themeforest.com/user/XpeedStudio' );
$manifest[ 'description' ]	 = esc_html__( 'BiziPress WordPress theme', 'bizipress' );
$manifest[ 'version' ]		 = '1.0';
$manifest[ 'author' ]			 = 'XpeedStuio';
$manifest[ 'author_uri' ]		 = esc_url( 'http://themeforest.com/user/XpeedStudio' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => '4.1',
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'page-builder'	 => array(),
	'seo'			 => array(),
	'backups'		 => array(),
	'slider'		 => array(),
	'analytics'		 => array(),
);
