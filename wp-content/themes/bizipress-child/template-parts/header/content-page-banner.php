<?php
if ( defined( 'FW' ) ) {

	///Global optipn
	$page_global_image			 = bizipress_get_option( 'global_header_image' );
	$page_global_heading_title	 = bizipress_get_option( 'global_header_title' );


	//Page settings
	$page_heading	 = fw_get_db_post_option( $post->ID, 'header_title' );
	$header_image	 = fw_get_db_post_option( $post->ID, 'header_image' );
	$header_brief	 = fw_get_db_post_option( $post->ID, 'header_brief' );



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

if (!is_front_page()) { ?>

<div class="breadcrumb_container">
<?php
	if ( function_exists('yoast_breadcrumb') )
	  	yoast_breadcrumb( '<div class="container">','</div>' );
?>	
</div>
<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $bg_image ); ?>>
	<?php
		echo bizipress_kses( $overlay );
	?>
	<div class="full-width">
		<div class="left_div"></div>
		<div class="container">
			<div class="row">
				<?php if( esc_html($heading) != "") { ?>
				<div class="banner_card">
					<label><?php the_title(); ?></label>
					<h3><?php echo esc_html( $heading ); ?></h3>
					<p><?php echo esc_html( $header_brief ); ?></p>
				</div>
				<?php } ?>
			</div><!-- Row end -->
		</div><!-- Container end -->
		<div class="right_div"></div>
	</div>
</div><!-- Banner area end --> 
<?php } ?>