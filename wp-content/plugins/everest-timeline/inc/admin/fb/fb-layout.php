<div class="et-fb-layout-wrap">
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Templates', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[fb_template]" class="et-fb-template">
                <?php
                $facebook_styles = array(
                    'Dark box template',
                    'Elegant template',
                    'Simple template'
                );
                $f = 1;
                foreach ( $facebook_styles as $facebook_style ) {
                    ?>
                    <option value="template-<?php echo $f; ?>" <?php if ( ! empty( $et_option[ 'fb_template' ] ) ) selected( $et_option[ 'fb_template' ], 'template-' . $f ); ?>><?php echo $facebook_style; ?></option>
                    <?php
                    $f ++;
                }
                ?>
            </select>
            <div class="et-fb-timeline-demo et-preview-image">
                <?php
                for ( $cnt = 1; $cnt <= 3; $cnt ++ ) {
                    if ( isset( $et_option[ 'fb_template' ] ) ) {
                        $option_value = $et_option[ 'fb_template' ];
                        $exploed_array = explode( '-', $option_value );
                        $cnt_num = $exploed_array[ 1 ];
                        if ( $cnt != $cnt_num ) {
                            $style = "style='display:none;'";
                        } else {
                            $style = '';
                        }
                    }
                    ?>
                    <div class="et-fb-timeline-common" id="et-fb-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                        <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                        <img src="<?php echo ET_IMG_DIR . '/demo/fb/' . 'fb' . $cnt . '.jpg' ?>"/>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>