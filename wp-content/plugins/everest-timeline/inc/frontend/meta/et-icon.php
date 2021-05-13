<?php
/*
 * Show Icon
 */
$icon_type = isset( $et_extra_option[ 'icon_type' ] ) ? esc_attr( $et_extra_option[ 'icon_type' ] ) : 'icon';
if ( $icon_type == 'icon' ) {
    if ( ! empty( $et_extra_option[ 'font_icon' ] ) ) {
        $v = explode( '|', $et_extra_option[ 'font_icon' ] );
        $font = $v[ 0 ] . ' ' . $v[ 1 ];
    } else {
        $font = 'fa fa-calendar';
    }
    ?>
    <i class="<?php echo esc_attr( $font ); ?>" aria-hidden="true"></i>
    <?php
} else {
    ?>
    <img src="<?php echo esc_url( $et_extra_option[ 'icon_image_url' ] ); ?>">
    <?php
}