<div class="et-other-outer-wrap">
    <div class ="et-post-option-wrap">
        <label for="et-show-scrolling-nav" class="et-lighbox">
            <?php _e( 'Scrolling Navigation', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-scrolling et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_scrolling_nav' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_scrolling_nav]" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( "Enable to show scrolling navigation sidebar.", ET_TD ) ?></p>

            <p class="description"> <?php _e( "Note: This is only avaliable for wordpress post.This is not avaliable for loadmore and infinite scroll pagination.", ET_TD ) ?></p>

        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Template', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_nav_template]" class="et-nav-template">
                <?php
                $navigation_styles = array(
                    'Menu bar template',
                    'Year listed template',
                    'Icon bar template',
                    'Dot bar template',
                    'Caterpillar bar template'
                );
                $n = 1;
                foreach ( $navigation_styles as $navigation_style ) {
                    ?>
                    <option value="template-<?php echo $n; ?>" <?php if ( ! empty( $et_option[ 'et_nav_template' ] ) ) selected( $et_option[ 'et_nav_template' ], 'template-' . $n ); ?>><?php echo $navigation_style; ?></option>
                    <?php
                    $n ++;
                }
                ?>
            </select>
            <div class="et-nav-demo et-preview-image">
                <?php
                for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                    if ( isset( $et_option[ 'et_nav_template' ] ) ) {
                        $option_value = $et_option[ 'et_nav_template' ];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[ 1 ];
                        if ( $cnt != $cnt_num ) {
                            $style = "style='display:none;'";
                        } else {
                            $style = '';
                        }
                    }
                    ?>
                    <div class="et-nav-common" id="et-nav-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                        <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                        <img src="<?php echo ET_IMG_DIR . '/demo/navigation/' . 'navi' . $cnt . '.jpg' ?>"/>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
