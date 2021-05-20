<?php
/**
 * Blog Header
 *
 */
 
	
if ( defined( 'FW' ) ) {

	///Global optipn
	$page_global_image			 = bizipress_get_option( 'global_header_image' );
	$page_global_heading_title	 = bizipress_get_option( 'global_header_title' );


	//Page settings
	$page_heading	 = fw_get_db_post_option( $post->ID, 'header_title' );
	$header_image	 = fw_get_db_post_option( $post->ID, 'header_image' );



	$heading = $page_heading != '' ? $page_heading : $page_global_heading_title;


	if ( $header_image == '' ) {
		$bg_image = $page_global_image != '' ? 'style="background: url(' . $page_global_image[ 'url' ] . ')"' : '';
	} else {
		$bg_image = $header_image != '' ? 'style="background: url(' . $header_image[ 'url' ] . ')"' : '';
	}


	//Overlay option 
	$header_overlay = fw_get_db_post_option( $post->ID, 'overlay' );
	if ( $header_overlay != '' ) {
		$overlay = '<div class="header-overlay" style="background-color:' . $header_overlay . '"></div>';
	}
}
