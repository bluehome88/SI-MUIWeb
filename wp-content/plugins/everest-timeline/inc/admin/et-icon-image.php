<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$image_url = sanitize_text_field( $_POST[ 'image_url' ] );
$et_slider_prefix = "et_extra_option[icon_image_url]";
?>
<div class="et-icon-image-preview">
    <div class="et-icon-img-wrap clearfix">
        <a href="javascript:void(0)" class="et-delete-icon-image"><span class="dashicons dashicons-trash"></span></a>
    </div>
    <div class="et-img-collection-wrap">
        <img  class="et-icon-img" src="<?php echo esc_attr( $image_url ); ?>" alt="">
    </div>
    <input type="hidden" class="et-slider-image-url" name="<?php echo esc_attr( $et_slider_prefix . '[icon_image_url]' ); ?>"  value="<?php echo esc_attr( $image_url ); ?>" />
</div>