<?php
if ( isset( $tweet -> extended_entities ) ) {
    $image_size = 'small';
    if ( count( $tweet -> extended_entities -> media ) > 1 ) {
        ?>
        <div class="et-extra-slider-wrap et-common-wrap" data-id="et_extra_<?php
        echo rand( 1111111, 9999999 );
        ?>">

            <?php
            foreach ( $tweet -> extended_entities -> media as $media ) {
                ?>
                <div class="et-extra-slider-item">
                    <?php if ( isset( $et_option[ 'et_show_lightbox' ] ) && $et_option[ 'et_show_lightbox' ] == '1' ) {
                        ?>
                        <a class="et-lightbox-image" href="<?php echo esc_attr( $media -> media_url_https ); ?>">
                            <img src="<?php echo esc_attr( $media -> media_url_https ) . ':' . $image_size; ?>" style="max-width: 100%;"/></a>

                        <?php
                    } else {
                        ?>
                        <img src="<?php echo esc_attr( $media -> media_url_https ) . ':' . $image_size; ?>" style="max-width: 100%;"/>
                        <?php
                    }
                    ?>
                </div>
                <?php }
            ?>
        </div>
        <?php
    } else {
        foreach ( $tweet -> extended_entities -> media as $media ) {
            if ( isset( $et_option[ 'et_show_lightbox' ] ) && $et_option[ 'et_show_lightbox' ] == '1' ) {
                ?>
                <a class="et-lightbox-image" href="<?php echo esc_attr( $media -> media_url_https ); ?>">
                    <img src="<?php echo esc_attr( $media -> media_url_https ) . ':' . $image_size; ?>" style="max-width: 100%;"/></a>

                <?php
            } else {
                ?>
                <img src="<?php echo esc_attr( $media -> media_url_https ) . ':' . $image_size; ?>" style="max-width: 100%;"/>
                <?php
            }
        }
    }
}
