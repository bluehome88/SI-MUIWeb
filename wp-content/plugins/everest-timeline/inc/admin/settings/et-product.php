<div class="et-general-outer-wrap">
    <div class ="et-post-option-wrap">
        <label for="et-show-price" class="et-show-price">
            <?php _e( 'Enable Price', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-display-price et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_display_price' ] ) ) {
                    echo esc_attr( $et_option[ 'et_display_price' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_display_price]" <?php if ( isset( $et_option[ 'et_display_price' ] ) && $et_option[ 'et_display_price' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show product price in the frontend.', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-show-cart" class="et-show-cart">
            <?php _e( 'Enable Add To Cart Button', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-display-cart et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_display_cart' ] ) ) {
                    echo esc_attr( $et_option[ 'et_display_cart' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_display_cart]" <?php if ( isset( $et_option[ 'et_display_cart' ] ) && $et_option[ 'et_display_cart' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show product add to cart button in the frontend.', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-show-wishlist" class="et-show-wishlist">
            <?php _e( 'Enable Add To Wishlist Button', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-display-wishlist et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_display_wishlist' ] ) ) {
                    echo esc_attr( $et_option[ 'et_display_wishlist' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_display_wishlist]" <?php if ( isset( $et_option[ 'et_display_wishlist' ] ) && $et_option[ 'et_display_wishlist' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show product add to wishlist button in the frontend.', ET_TD ) ?></p>
        </div>
    </div>
</div>