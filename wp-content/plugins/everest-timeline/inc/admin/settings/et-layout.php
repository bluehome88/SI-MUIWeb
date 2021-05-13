<div class="et-layout-outer-wrap">
    <div class="et-timeline-setting-wrap">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Timeline Layout', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[timeline_layout]" class="et-timeline-layout">
                    <option value="vertical"  <?php if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' ) echo 'selected=="selected"'; ?>><?php _e( 'Vertical Timeline Layout', ET_TD ) ?></option>
                    <option value="horizontal"  <?php if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'horizontal' ) echo 'selected=="selected"'; ?>><?php _e( 'Horizontal Timeline Layout', ET_TD ) ?></option>
                    <option value="one_side"  <?php if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'one_side' ) echo 'selected=="selected"'; ?>><?php _e( 'One Side Timeline Layout', ET_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="et-vertical-wrap">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Vertical Template', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[timeline_vertical_template]" class="et-vertical-template">
                        <?php
                        $vertical_styles = array( 'Classic template', 'Title focused template', 'Author focused template', 'Circular date template', 'Boxed template', 'Arrow date template', 'Double layer template', 'Circular icon template', 'Iconic template', 'Icon date parallel template', 'Whitish boxed template', 'Attached date template', 'L shaped image template',
                            'Corner attached date template', 'Box shawod template', 'Front date template', 'Triangle date template', 'Colorfull template' );
                        $k = 1;
                        foreach ( $vertical_styles as $vertical_style ) {
                            ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $et_option[ 'timeline_vertical_template' ] ) ) selected( $et_option[ 'timeline_vertical_template' ], 'template-' . $k ); ?>><?php echo $vertical_style; ?></option>
                            <?php
                            $k ++;
                        }
                        ?>

                    </select>
                    <div class="et-vertical-timeline-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 18; $cnt ++ ) {
                            if ( isset( $et_option[ 'timeline_vertical_template' ] ) ) {
                                $option_value = $et_option[ 'timeline_vertical_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-vertical-timeline-common" id="et-vertical-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                                <img src="<?php echo ET_IMG_DIR . '/demo/vertical/' . 'v' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="et-horizontal-wrap" style="display: none;">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Horizontal Template', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[timeline_horizontal_template]" class="et-horizontal-template">
                        <?php
                        $horizontal_styles = array(
                            'Multi slide template',
                            'Title highlighted template',
                            'Date highlighted template',
                            'Antenna template',
                            'Date bar template',
                            'Banner date template',
                            'Bold date template',
                            'Content overlay template',
                            'Single date template',
                            'Hoveric date template',
                            'Blog style template',
                            'Dark boxed template',
                            'Bigger Circular date template',
                            'Banner icon template',
                            'Bold title template',
                            'Colorfull date template',
                            'Slider bottom bar tempalte',
                            'List style timeline template',
                            'Slider top banner template',
                            'Circular image template',
                            'Date iconic template'
                        );
                        $h = 1;
                        foreach ( $horizontal_styles as $horizontal_style ) {
                            ?>
                            <option value="template-<?php echo $h; ?>" <?php if ( ! empty( $et_option[ 'timeline_horizontal_template' ] ) ) selected( $et_option[ 'timeline_horizontal_template' ], 'template-' . $h ); ?>><?php echo $horizontal_style; ?></option>
                            <?php
                            $h ++;
                        }
                        ?>
                    </select>
                    <div class="et-horizontal-timeline-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 21; $cnt ++ ) {
                            if ( isset( $et_option[ 'timeline_horizontal_template' ] ) ) {
                                $option_value = $et_option[ 'timeline_horizontal_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-horizontal-timeline-common" id="et-horizontal-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                                <img src="<?php echo ET_IMG_DIR . '/demo/horizontal/' . 'h' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="et-one-side-wrap" style="display: none;">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'One Side Template', ET_TD ); ?></label>
                <div class="et-post-field-wrap">


                    <select name="et_option[timeline_one_side_template]" class="et-one-side-template">
                        <?php
                        $one_side_styles = array(
                            'Title timeline template',
                            'Category timeline template',
                            'Bold timeline template',
                            'Boxed blog template',
                            'Tab timeline template',
                        );
                        $o = 1;
                        foreach ( $one_side_styles as $one_side_style ) {
                            ?>
                            <option value="template-<?php echo $o; ?>" <?php if ( ! empty( $et_option[ 'timeline_one_side_template' ] ) ) selected( $et_option[ 'timeline_one_side_template' ], 'template-' . $o ); ?>><?php echo $one_side_style; ?></option>
                            <?php
                            $o ++;
                        }
                        ?>
                    </select>
                    <div class="et-one-side-timeline-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                            if ( isset( $et_option[ 'timeline_one_side_template' ] ) ) {
                                $option_value = $et_option[ 'timeline_one_side_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-one-side-timeline-common" id="et-one-side-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                                <img src="<?php echo ET_IMG_DIR . '/demo/one-side/' . 'o' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Position', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[timeline_oneside_position]" class="et-timeline-position">
                        <option value="left"  <?php if ( isset( $et_option[ 'timeline_oneside_position' ] ) && $et_option[ 'timeline_oneside_position' ] == 'left' ) echo 'selected=="selected"'; ?>><?php _e( 'Left', ET_TD ) ?></option>
                        <option value="right"  <?php if ( isset( $et_option[ 'timeline_oneside_position' ] ) && $et_option[ 'timeline_oneside_position' ] == 'right' ) echo 'selected=="selected"'; ?>><?php _e( 'Right', ET_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-show-custom-color" class="et-show-custom-color">
                <?php _e( 'Enable Custom Color', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-display-custom-color et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_enable_custom_color' ] ) ) {
                        echo esc_attr( $et_option[ 'et_enable_custom_color' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="et_option[et_enable_custom_color]" <?php if ( isset( $et_option[ 'et_enable_custom_color' ] ) && $et_option[ 'et_enable_custom_color' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable custom color for the template.', ET_TD ) ?></p>
            </div>
        </div>
        <div class="et-custom-color-wrapper" <?php if ( isset( $et_option[ 'et_enable_custom_color' ] ) && $et_option[ 'et_enable_custom_color' ] == '1' ) {
                        ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
            <div class="et-post-option-wrap">
                <label><?php _e( 'Select Template Color', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <input type="text" class="et-color-picker et-template-color" data-alpha="true" name="et_option[et_template_custom_color]"  value="<?php
                           if ( isset( $et_option[ 'et_template_custom_color' ] ) ) {
                               echo esc_attr( $et_option[ 'et_template_custom_color' ] );
                           }
                           ?>"/>
                </div>
            </div>
        </div>
    </div>
</div>

