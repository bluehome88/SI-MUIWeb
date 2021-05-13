<?php
/**
 * Blog Header
 *
 */
$bg_image	 = $heading	 = '';
if ( defined( 'FW' ) ) {


	///Global optipn
	$page_global_image			 = bizipress_get_option( 'global_header_image' );
	$page_global_heading_title	 = bizipress_get_option( 'global_header_title' );


	//Page settings
	$heading_title	 = fw_get_db_post_option( $post->ID, 'header_title' );
	$header_image	 = fw_get_db_post_option( $post->ID, 'header_image' );
	if ( is_single() ) {
		$heading = $heading_title != '' ? $heading_title : $page_global_heading_title;

		if ( $header_image == '' &&  $page_global_image != '') {
			$bg_image = 'style="background: url(' . $page_global_image[ 'url' ] . ')"';
		} elseif($header_image != '' ) {
			$bg_image = 'style="background: url(' . $header_image[ 'url' ] . ')"';
		}
	} else {
		$heading	 = $page_global_heading_title;
		$bg_image	 = $page_global_image != '' ? 'style="background: url(' . $page_global_image[ 'url' ] . ')"' : '';
	}
}
?>

<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $bg_image ); ?>>
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

