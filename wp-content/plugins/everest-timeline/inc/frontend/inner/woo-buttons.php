<?php
if ( (isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) || $et_option[ 'post_type' ] == 'download' ) {
    ?>
    <div class="et-timeline-woo-wrapper">
        <?php
        include(ET_PATH . 'inc/frontend/inner/et-price.php');
        ?>
        <div class="et-woo-button-wrapper <?php
             if ( $et_option[ 'post_type' ] == 'download' ) {
                 echo 'et-edd-buttons';
             }
             ?>">
                 <?php
                 include(ET_PATH . 'inc/frontend/inner/et-cart.php');
                 include(ET_PATH . 'inc/frontend/inner/et-wishlist.php');
                 ?>
        </div>
    </div>
    <?php
}