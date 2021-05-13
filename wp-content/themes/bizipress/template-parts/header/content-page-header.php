<?php
/**
 * Blog Header
 *
 */
$bg_image	 = $heading	 = $overlay	 = '';
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
?>


<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $bg_image ); ?>>
	<?php
	echo bizipress_kses( $overlay );
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="banner-heading">
					<h1 class="banner-title"><?php echo esc_html( $heading ); ?></h1>
					<?php
					if ( bizipress_get_option( 'breadcrumb' ) == 'no' ):
						?>
						<?php echo bizipress_get_breadcrumbs();
						?>
					<?php endif; ?>
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end --> 

