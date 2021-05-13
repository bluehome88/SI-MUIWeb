<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}


if ( isset( $atts[ 'xs_id' ] ) && $atts[ 'link_id' ] == '' ) {
	$section_class	 = ' xs-sc-' . $atts[ 'xs_id' ];
	$id				 = 'xs-sec-' . $atts[ 'xs_id' ];
} else if ( $atts[ 'link_id' ] != '' ) {
	$section_class	 = ' xs-sc-' . $atts[ 'xs_id' ];
	$id				 = $atts[ 'link_id' ];
} else {
	$id				 = uniqid( 'xs-sec-' );
	$section_class	 = '';
}


$section_extra_classes	 = $data_attr				 = '';
$bg_options				 = $atts[ 'background_options' ][ 'background' ];
if ( $bg_options == 'image' ) {
	$section_extra_classes .= 'parallax-section';
//	if ( isset( $atts[ 'background_options' ][ 'image' ][ 'parallax' ] ) && $atts[ 'background_options' ][ 'image' ][ 'parallax' ] == 'yes' ) {
//		$data_attr .= 'data-stellar-background-ratio="0.5"';
//	}
} else if ( $bg_options == 'video' ) {
	$video_type	 = $atts[ 'background_options' ][ 'video' ][ 'video_type' ];
	$video_img	 = '';
	if ( $video_type[ 'select_video_xs' ] == 'media_upload' && isset( $video_type[ 'media_upload' ][ 'video' ][ 'url' ] ) ) {

		$video_url = $video_type[ 'media_upload' ][ 'video' ][ 'url' ];
		if ( isset( $video_type[ 'media_upload' ][ 'video_img' ][ 'data' ][ 'icon' ] ) ) {
			$video_img = $video_type[ 'media_upload' ][ 'video_img' ][ 'data' ][ 'icon' ];
		}
	} else {
		$video_url = $video_type[ 'youtube' ][ 'video' ];
		if ( isset( $video_type[ 'youtube' ][ 'video_img' ][ 'data' ][ 'icon' ] ) && !empty( $video_type[ 'youtube' ][ 'video_img' ][ 'data' ][ 'icon' ] ) ) {
			$video_img = $video_type[ 'youtube' ][ 'video_img' ][ 'data' ][ 'icon' ];
		}
	}
	$filetype	 = wp_check_filetype( $video_url );
	$filetypes	 = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype	 = array_key_exists( (string) $filetype[ 'ext' ], $filetypes ) ? $filetypes[ $filetype[ 'ext' ] ] : 'video';
	$data_attr .= 'data-wallpaper-options="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $video_url, 'poster' => $video_img ) ) ) ) . '"';
	$section_extra_classes .= 'background-video';
}


$overlay_div = '';
$bg			 = $atts[ 'background_options' ][ 'image' ];
if ( isset( $bg ) || $atts[ 'background_options' ][ 'background' ] == 'image' || $bg_options == 'video' ) {
	$overlay_div = '<div class="xs-main-overlay"></div>';
}

if ( $atts[ 'height' ] == 'xs-section-height-sm' || $atts[ 'height' ] == 'xs-section-height-md' || $atts[ 'height' ] == 'xs-section-height-lg' ) {
	$section_extra_classes .= ' ' . $atts[ 'height' ];
}


$container_class = ( isset( $atts[ 'is_fullwidth' ] ) && $atts[ 'is_fullwidth' ] ) ? 'fw-container-fluid' : 'fw-container';



$show_device = isset( $atts[ 'display_desktop' ] ) && $atts[ 'display_desktop' ] == 'no' ? 'xs-hidden-lg ' : '';
$show_device .= isset( $atts[ 'display_medium' ] ) && $atts[ 'display_medium' ] == 'no' ? 'xs-hidden-md ' : '';
$show_device .= isset( $atts[ 'display_tablet' ] ) && $atts[ 'display_tablet' ] == 'no' ? 'xs-hidden-sm ' : '';
$show_device .= isset( $atts[ 'display_phone' ]) && $atts[ 'display_phone' ] == 'no' ? 'xs-hidden-xs ' : '';



$section_default_padding = (int) $atts[ 'padding_top' ] == '100' && (int) $atts[ 'padding_bottom' ] == '100' ? 'section-padding' : '';

$section_classes = $section_extra_classes . ' ' . $section_class . ' ' . $atts[ 'class' ] . ' ' . $show_device . ' ' . $section_default_padding;
?>
<section  id="<?php echo esc_attr( $id ); ?>" class="fw-main-row <?php echo esc_attr( $section_classes ) ?>" <?php echo bizipress_kses( $data_attr ); ?> >
	<?php echo bizipress_kses( $overlay_div ); ?>


    <div class="<?php echo esc_attr( $container_class ); ?>">
		<?php echo do_shortcode( $content ); ?>
    </div>
</section>

