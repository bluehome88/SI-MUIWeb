<div class="et-other-outer-wrap">
    <div class="et-post-option-wrap">
        <label for="et-show-animation" class="et-show-animate">
            <?php _e( 'Animation', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-animation et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_animation' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_animation' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_animation]" <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( "Enable to show animation for image's media type.", ET_TD ) ?></p>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Animation Type', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[animation_type]" class="et-animation-type">
                <option value="bounceInUp"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'bounceInUp' ) echo 'selected=="selected"'; ?>><?php _e( 'BounceInUp', ET_TD ) ?></option>
                <option value="bounceInDown"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'bounceInDown' ) echo 'selected=="selected"'; ?>><?php _e( 'BounceInDown', ET_TD ) ?></option>
                <option value="fadeIn"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'fadeIn' ) echo 'selected=="selected"'; ?>><?php _e( 'FadeIn', ET_TD ) ?></option>
                <option value="fadeInDown"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'fadeInDown' ) echo 'selected=="selected"'; ?>><?php _e( 'FadeInDown', ET_TD ) ?></option>
                <option value="fadeInDownBig"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'fadeInDownBig' ) echo 'selected=="selected"'; ?>><?php _e( 'FadeInDownBig', ET_TD ) ?></option>
                <option value="fadeInUp"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'fadeInUp' ) echo 'selected=="selected"'; ?>><?php _e( 'FadeInUp', ET_TD ) ?></option>
                <option value="fadeInUpBig"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'fadeInUpBig' ) echo 'selected=="selected"'; ?>><?php _e( 'FadeInUpBig', ET_TD ) ?></option>
                <option value="zoomIn"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'zoomIn' ) echo 'selected=="selected"'; ?>><?php _e( 'ZoomIn', ET_TD ) ?></option>
                <option value="zoomInUp"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'zoomInUp' ) echo 'selected=="selected"'; ?>><?php _e( 'ZoomInUp', ET_TD ) ?></option>
                <option value="slideInDown"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'slideInDown' ) echo 'selected=="selected"'; ?>><?php _e( 'SlideInDown', ET_TD ) ?></option>
                <option value="slideInUp"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'slideInUp' ) echo 'selected=="selected"'; ?>><?php _e( 'SlideInUp', ET_TD ) ?></option>
                <option value="swing"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'swing' ) echo 'selected=="selected"'; ?>><?php _e( 'Swing', ET_TD ) ?></option>
                <option value="pulse"  <?php if ( isset( $et_option[ 'animation_type' ] ) && $et_option[ 'animation_type' ] == 'pulse' ) echo 'selected=="selected"'; ?>><?php _e( 'pulse', ET_TD ) ?></option>
            </select>
        </div>
    </div>
</div>




