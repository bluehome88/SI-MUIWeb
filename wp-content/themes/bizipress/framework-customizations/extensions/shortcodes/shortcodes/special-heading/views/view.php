<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$section_title_class = $center_class		 = $subtitle1			 = $subtitle2			 = $water_span_border	 = $water_available	 = '';

// for xs uniqid
if ( isset( $atts[ 'xs_id' ] ) ) {
	$id = ' xs-heading-' . $atts[ 'xs_id' ];
} else {
	$id = uniqid( 'xs-heading-' );
}

$heading_margin = $atts[ 'heading_margin' ] == '60' ? 'heading_margin' : '';


$heading_style = $atts[ 'heading_settings' ];
if ( $heading_style[ 'heading_style' ] == 'heading-style-1' ) {
	$center_class = 'text-center';

	$section_title_class = 'section-title';

	$subtitle1 = $atts[ 'subtitle' ] != '' ? "<span class='shortheading'>{$atts[ 'subtitle' ]}</span>" : "";
} else if ( $heading_style[ 'heading_style' ] == 'heading-style-2' ) {
	$center_class = 'text-left';

	$section_title_class = 'section-title border-left';

	$subtitle2 = $atts[ 'subtitle' ] != '' ? "<span>{$atts[ 'subtitle' ]}</span>" : "";
} else if ( $heading_style[ 'heading_style' ] == 'heading-style-3' ) {
	$subtitle1 = $atts[ 'subtitle' ] != '' ? "<span class='shortheading'>{$atts[ 'subtitle' ]}</span>" : "";

	$border = $heading_style[ 'heading-style-3' ][ 'border' ] == 'no' ? 'boder-none' : '';

	$section_title_class = 'content-title ' . $border;
} else if ( $heading_style[ 'heading_style' ] == 'heading-style-4' ) {
	$center_class = 'text-center';

//	water title style
	$water_title		 = $atts[ 'heading_settings' ][ 'heading-style-4' ][ 'watertitle' ];
	$water_available	 = $water_title != '' ? 'data-title="' . $water_title . '"' : '';
	$water_span_border	 = "<span class='dashborder'>&nbsp;</span>";
//	$water_border = 

	$section_title_class = 'section-title-dash';

	$subtitle1 = $atts[ 'subtitle' ] != '' ? "<span class='shortheading'>{$atts[ 'subtitle' ]}</span>" : "";
}
?>

<div class="heading <?php echo esc_attr( $id ); ?> <?php echo esc_attr( $center_class ); ?> <?php echo esc_attr( $atts[ 'class' ] ); ?> <?php echo esc_attr( $heading_margin ); ?>">
	<?php
	$title	 = "<{$atts[ 'heading' ]} {$water_available} class='xs-title $section_title_class'>{$subtitle1} {$atts[ 'title' ]} {$subtitle2} {$water_span_border}</{$atts[ 'heading' ]}>";
	$heading = $atts[ 'title' ] ? $title : '';

	echo bizipress_return( $heading );
	?>
</div>
