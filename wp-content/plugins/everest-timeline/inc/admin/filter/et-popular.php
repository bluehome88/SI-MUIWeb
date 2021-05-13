<div class ="et-post-option-wrap">
    <label for="et-show-popular-query" class="et-popular-relation">
        <?php _e( 'Filter Popular Post', ET_TD ); ?>
    </label>
    <div class="et-post-field-wrap">
        <label class="et-switch">
            <input type="checkbox" class="et-show-popular-relation et-checkbox" value="<?php
            if ( isset( $et_option[ 'et_show_popular_query' ] ) ) {
                echo esc_attr( $et_option[ 'et_show_popular_query' ] );
            } else {
                echo '0';
            }
            ?>" name="et_option[et_show_popular_query]" <?php if ( isset( $et_option[ 'et_show_popular_query' ] ) && $et_option[ 'et_show_popular_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="et-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show popular posts.', ET_TD ) ?></p>
    </div>
</div>
<div class="et-popular-inner-wrap" <?php if ( isset( $et_option[ 'et_show_popular_query' ] ) && $et_option[ 'et_show_popular_query' ] == '1' ) { ?>
         style="display: block;" <?php } else { ?>
         style="display: none;" <?php } ?>>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Choose Popular Posts By', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_select_popular]" class="et-select-popular">
                <option value="view"  <?php if ( isset( $et_option[ 'et_select_popular' ] ) && $et_option[ 'et_select_popular' ] == 'view' ) echo 'selected == "selected"'; ?>><?php _e( 'View', ET_TD ) ?></option>
                <option value="comment"  <?php if ( isset( $et_option[ 'et_select_popular' ] ) && $et_option[ 'et_select_popular' ] == 'comment' ) echo 'selected == "selected"'; ?>><?php _e( 'Comment', ET_TD ) ?></option>
            </select>
        </div>
    </div>
</div>