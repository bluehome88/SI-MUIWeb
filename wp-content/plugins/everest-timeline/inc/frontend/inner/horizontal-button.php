<?php
if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) {
    if ( isset( $et_option[ 'post_url' ] ) && $et_option[ 'post_url' ] == 'post_link' ) {
        ?>
        <div class="et-link-button">
            <a href="<?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
        </div>
        <?php
    } else {
        if ( isset( $et_option[ 'custom_link_type' ] ) && $et_option[ 'custom_link_type' ] == 'common_link' ) {
            ?>
            <div class="et-link-button">
                <a href="<?php echo esc_url( $et_option[ 'et_custom_url' ] ); ?>" target="_<?php echo $action_link; ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
            </div>
            <?php
        } else {
            ?>
            <div class="et-link-button">
                <a href="<?php echo esc_url( $et_extra_option[ 'individual_custom_url' ] ); ?>" target="_<?php echo $action_link; ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
            </div>
            <?php
        }
    }
}

