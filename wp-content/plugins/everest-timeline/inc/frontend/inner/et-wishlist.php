<?php
if ( (isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product') && class_exists( 'WooCommerce' ) ) {

    if ( isset( $et_option[ 'et_display_wishlist' ] ) && $et_option[ 'et_display_wishlist' ] == '1' ) {
        ?>
        <div class="et-wishlist-wrap et-icon-hover-wrap">
            <?php
            $et_obj = new ET_Everest_Timeline_Class();
            echo $et_obj -> et_wishlist_button( $post_id );
            ?>
        </div>
        <?php
    }
}