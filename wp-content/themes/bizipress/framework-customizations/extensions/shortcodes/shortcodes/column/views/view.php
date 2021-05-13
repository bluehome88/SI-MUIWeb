<div class="fw-col-inner"><?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );

// for xs uniqid
if ( isset( $atts[ 'xs_id' ] ) ) {
	$custom_class	 = ' xs-sc-' . $atts[ 'xs_id' ];
	$id				 = 'xs-col-' . $atts[ 'xs_id' ];
} else {
	$id = uniqid( 'xs-col-' );
}

$id_to_class = array(
	'1_6'	 => 'fw-col-md-2',
	'1_4'	 => 'fw-col-md-3',
	'1_3'	 => 'fw-col-md-4',
	'1_2'	 => 'fw-col-md-6',
	'2_3'	 => 'fw-col-md-8',
	'3_4'	 => 'fw-col-md-9',
	'1_1'	 => 'fw-col-md-12',
	'5_12'	 => 'fw-col-md-5',
	'7_12'	 => 'fw-col-md-7'
);

$column_width = '';
if ( isset( $atts[ 'responsive_layout' ] ) ) {
	$responsive_layout	 = $atts[ 'responsive_layout' ];
	$column_width		 = $responsive_layout[ 'desktop' ] != '' ? $responsive_layout[ 'desktop' ] . ' ' : '';
	$column_width .= $id_to_class[ $atts[ 'width' ] ];
	$column_width .= $responsive_layout[ 'tablet' ] != '' ? ' ' . $responsive_layout[ 'tablet' ] : '';
	$column_width .= $responsive_layout[ 'phonexs' ] != 'fw-col-xs-12' ? ' ' . $responsive_layout[ 'phonexs' ] : '';
} else {
	$column_width .= $id_to_class[ $atts[ 'width' ] ];
}

$show_device = $atts[ 'display_desktop' ][ 'selected' ] != 'yes' ? 'xs-hidden-lg ' : '';
$show_device .= $atts[ 'display_medium' ][ 'selected' ] != 'yes' ? 'xs-hidden-md ' : '';
$show_device .= $atts[ 'display_tablet' ][ 'selected' ] != 'yes' ? 'xs-hidden-sm ' : '';
$show_device .= $atts[ 'display_phone' ][ 'selected' ] != 'yes' ? 'xs-hidden-xs ' : '';



//Animation
$animation = '';

if ( $atts[ 'animation' ] != 'no' && isset( $atts[ 'animation' ] ) ) {
	$animation = 'foo';
}

//offset
$offset = '';
if ( isset( $atts[ 'column_offset' ] ) ) {
	$offsets = $atts[ 'column_offset' ];
	$offset .= $offsets[ 'md_offset' ] != '' ? $offsets[ 'md_offset' ] . ' ' : '';
	$offset .= $offsets[ 'sm_offset' ] != '' ? $offsets[ 'sm_offset' ] : '';
}

//Overlay Div
$overlay_div = '';
$bg			 = $atts[ 'background_options' ][ 'image' ];
if ( isset( $bg ) && $atts[ 'background_options' ][ 'background' ] == 'image' && $bg[ 'overlay_options' ][ 'yes' ][ 'background' ] != '' ) {
	$overlay_div = '<div class="xs-main-overlay"></div>';
}

//Last column
$last_column = '';
if ( $atts[ 'last_column_large_device' ] == 'yes' || $atts[ 'last_column_large_device' ] == 'yes' ) {
	$last		 = $atts[ 'last_column_large_device' ] == 'yes' ? 'visible-md ' : '';
	$last .= $atts[ 'last_column_large_device' ] == 'yes' ? 'visible-sm' : '';
	$last_column = '<div class="clearfix ' . $last . '"></div>';
}


//Column Pull
$pullpush = '';
if ( isset( $atts[ 'xs_column_pull_push' ] ) ) {
	$pushpull = $atts[ 'xs_column_pull_push' ];
	if ( $pushpull[ 'selected' ] != 'no' ) {
		$pullpush .= $pushpull[ 'yes' ][ 'column_push' ][ 'column_md_push' ] || $pushpull[ 'yes' ][ 'column_push' ][ 'column_md_push' ] != '' ? $pushpull[ 'yes' ][ 'column_push' ][ 'column_md_push' ] . ' ' . $pushpull[ 'yes' ][ 'column_pull' ][ 'column_sm_pull' ] : '';
		$pullpush .= $pushpull[ 'yes' ][ 'column_pull' ][ 'column_md_pull' ] || $pushpull[ 'yes' ][ 'column_pull' ][ 'column_sm_pull' ] != '' ? $pushpull[ 'yes' ][ 'column_pull' ][ 'column_md_pull' ] . ' ' . $pushpull[ 'yes' ][ 'column_pull' ][ 'column_sm_pull' ] : '';
	}
}


//Text Align class
$text_align = $atts[ 'txt_align' ] != 'none' ? $atts[ 'txt_align' ] : '';

//Column Classes
$all_class = $column_width . ' ' . $offset . ' ' . $pullpush . ' ' . $show_device . ' ' . $custom_class . ' ' . $atts[ 'class' ] . ' ' . $atts[ 'default_padding' ] . ' ' . $text_align . ' ' . $animation;
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $all_class ); ?>">
    <div class="fw-main-row">
		<?php echo bizipress_kses( $overlay_div ) ?>
		<div class="fw-col-inner">
			<?php echo bizipress_theme_translate( esc_textarea( do_shortcode( $content ) ) ); ?>
		</div>
    </div>
</div>
<?php
echo bizipress_kses( $last_column );
