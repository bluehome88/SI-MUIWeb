<?php
if ( isset( $et_option[ 'et_display_price' ] ) && $et_option[ 'et_display_price' ] == '1' ) {
    ?>
    <div class="et-price">
        <?php
        if ( (isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product') && class_exists( 'WooCommerce' ) ) {
            woocommerce_template_loop_price();
        } else if ( $et_option[ 'post_type' ] == 'download' ) {

            $et_obj = new ET_Everest_Timeline_Class();
            echo $et_obj -> et_edd_pricing( $post -> ID );
        }
        ?>
    </div>
    <?php
}