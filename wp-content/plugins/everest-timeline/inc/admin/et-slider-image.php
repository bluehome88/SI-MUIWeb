<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$slider_url = sanitize_text_field( $_POST[ 'image_url' ] );
$slider_key = $this -> et_generate_random_string( 10 );
$et_slider_prefix = "et_extra_option[image][image_$slider_key]";
?>
<div class="et-slider-wrap">
    <div class="et-slider-image-preview">
        <div class="et-each-slider-wrap clearfix">
            <a href="javascript:void(0)" class="et-sort-slider-image"><span class="dashicons dashicons-move"></span></a>
            <a href="javascript:void(0)" class="et-delete-slider-image"><span class="dashicons dashicons-trash"></span></a>
        </div>
        <div class="et-slider-collection-wrap">
            <img  class="et-slider-image" src="<?php echo esc_attr( $slider_url ); ?>" alt="">
        </div>
        <input type="hidden" class="et-slider-image-url" name="<?php echo esc_attr( $et_slider_prefix . '[slider_image_url]' ); ?>"  value="<?php echo esc_attr( $slider_url ); ?>" />
    </div>
</div>
