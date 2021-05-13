<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$height = '';
if ( $atts[ 'height' ] == 'space-sm' || $atts[ 'height' ] == 'space-md' || $atts[ 'height' ] == 'space-lg' ) {
	$height = $atts[ 'height' ];
}

$show_device = isset( $atts[ 'display_desktop' ][ 'selected' ] ) && $atts[ 'display_desktop' ][ 'selected' ] != 'yes' ? 'xs-hidden-lg ' : '';
$show_device .= isset( $atts[ 'display_medium' ] ) && $atts[ 'display_medium' ] != 'yes' ? 'xs-hidden-md ' : '';
$show_device .= isset( $atts[ 'display_tablet' ] ) && $atts[ 'display_tablet' ] != 'yes' ? 'xs-hidden-sm ' : '';
$show_device .= isset( $atts[ 'display_phone' ] ) && $atts[ 'display_phone' ] != 'yes' ? 'xs-hidden-xs ' : '';
?>
<div id="<?php echo isset( $atts[ 'xs_id' ] ) ? 'xs-sc-' . $atts[ 'xs_id' ] : 'space' ?>" class="fw-divider-space <?php echo esc_attr($height); ?>"></div>