<div class="et-twitter-layout-wrap">
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Templates', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[twitter_template]" class="et-twitter-template">
                <?php
                $twitter_styles = array(
                    'Rhombus pointed template',
                    'Whitish Content template',
                    'Aquamarine boxed template'
                );
                $t = 1;
                foreach ( $twitter_styles as $twitter_style ) {
                    ?>
                    <option value="template-<?php echo $t; ?>" <?php if ( ! empty( $et_option[ 'twitter_template' ] ) ) selected( $et_option[ 'twitter_template' ], 'template-' . $t ); ?>><?php echo $twitter_style; ?></option>
                    <?php
                    $t ++;
                }
                ?>
            </select>
            <div class="et-twitter-timeline-demo et-preview-image">
                <?php
                for ( $cnt = 1; $cnt <= 3; $cnt ++ ) {
                    if ( isset( $et_option[ 'twitter_template' ] ) ) {
                        $option_value = $et_option[ 'twitter_template' ];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[ 1 ];
                        if ( $cnt != $cnt_num ) {
                            $style = "style='display:none;'";
                        } else {
                            $style = '';
                        }
                    }
                    ?>
                    <div class="et-twitter-timeline-common" id="et-twitter-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                        <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                        <img src="<?php echo ET_IMG_DIR . '/demo/twitter/' . 't' . $cnt . '.jpg' ?>"/>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>