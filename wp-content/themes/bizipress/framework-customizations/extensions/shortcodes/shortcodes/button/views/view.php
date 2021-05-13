<?php if ( !defined( 'FW' ) ) die( 'Forbidden' ); ?>


<?php
$icon			 = $before_btn		 = $after_btn		 = '';
$btn_alignment	 = $atts[ 'btn_alignment' ];
$class			 = $atts[ 'class' ];

$before_btn	 = '<div class="' . $btn_alignment . ' ' . $class . '">';
$after_btn	 = '</div>';

echo wp_kses_post( $before_btn );

foreach ( $atts[ 'button_settings' ] as $btn ):

	if ( $btn[ 'icon' ] != '' ) {
		$icon_position	 = $btn[ 'icon_position' ];
		$icon			 = '<i class="' . $icon_position . ' ' . $btn[ 'icon' ] . '"></i>';
	}
	?>
	<a target="<?php echo esc_html( $btn[ 'target' ] ); ?>" href="<?php echo esc_url( $btn[ 'link' ] ); ?>" 
	class="margin-top-20 margin-right-10 
	<?php bizipress_theme_button_class( $btn[ 'style' ] ); ?>"> 
	<?php echo wp_kses( $icon, bizipress_allowed_html() ); ?> 
	<?php echo wp_kses_post( $btn[ 'label' ] ); ?></a>
	<?php
endforeach;
echo wp_kses_post( $after_btn );

