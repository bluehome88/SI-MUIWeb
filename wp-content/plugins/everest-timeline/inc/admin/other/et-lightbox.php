<div class="et-other-outer-wrap">
    <div class ="et-post-option-wrap">
        <label for="et-show-lightbox" class="et-lighbox">
            <?php _e( 'Lightbox', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-lightbox et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_lightbox' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_lightbox' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_lightbox]" <?php if ( isset( $et_option[ 'et_show_lightbox' ] ) && $et_option[ 'et_show_lightbox' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( "Enable to show lightbox for image's media type.", ET_TD ) ?></p>
        </div>
    </div>
</div>

