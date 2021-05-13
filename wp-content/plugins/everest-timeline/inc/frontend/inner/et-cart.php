<?php
if ( isset( $et_option[ 'et_display_cart' ] ) && ($et_option[ 'et_display_cart' ] == '1') ) {
    ?>
    <div class="et-cart-wrap">
        <?php
        if ( (isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product') && class_exists( 'WooCommerce' ) ) {
            woocommerce_template_loop_add_to_cart();
        } else if ( $et_option[ 'post_type' ] == 'download' ) {
            ?>
            <a class="et-edd-price add_to_cart_button" href ="<?php echo edd_get_checkout_uri(); ?>?edd_action=add_to_cart&download_id=<?php echo $post -> ID; ?>&edd_options[price_id]=0"><?php _e( 'Add To Cart', ET_TD ) ?></a>
            <?php
        }
        ?>
    </div>
    <?php
}

