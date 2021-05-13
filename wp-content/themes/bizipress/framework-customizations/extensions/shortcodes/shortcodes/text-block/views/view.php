<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$class = '';


if ( isset( $atts[ 'xs_id' ] ) ) {
	$class .= ' xs-text-block-' . $atts[ 'xs_id' ];
}


$class .= isset( $atts[ 'display_desktop' ] ) && $atts[ 'display_desktop' ] != 'yes' ? ' xs-hidden-lg' : '';
$class .= isset( $atts[ 'display_medium' ] ) && $atts[ 'display_medium' ] != 'yes' ? ' xs-hidden-md' : '';
$class .= isset( $atts[ 'display_tablet' ] ) && $atts[ 'display_tablet' ] != 'yes' ? ' xs-hidden-sm' : '';
$class .= isset( $atts[ 'display_phone' ] ) && $atts[ 'display_phone' ] != 'yes' ? ' xs-hidden-xs' : '';

$class .= !empty( $atts[ 'class' ] ) ? ' ' . $atts[ 'class' ] : '';
?>
<div class="xs-text-block <?php echo esc_attr($class); ?>">
	<?php echo do_shortcode( $atts[ 'text' ] ); ?>
</div>