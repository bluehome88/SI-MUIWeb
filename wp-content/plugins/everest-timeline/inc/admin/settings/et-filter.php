<div class="et-filter-setting-wrap">
    <div class ="et-post-option-wrap">
        <label for="et-enable-filter" class="et-enable-filter">
            <?php _e( 'Enable Filter', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-display-filter et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_display_filter' ] ) ) {
                    echo esc_attr( $et_option[ 'et_display_filter' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_display_filter]" <?php if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show filter on vertical and one side layout.', ET_TD ) ?></p>
        </div>
    </div>
    <div class="et-filter-enable-wrap" <?php if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) { ?>
             style="display: block;" <?php } else {
                    ?>
             style="display: none;" <?php } ?>>
        <div class ="et-post-option-wrap">
            <label for="all-items-label" class="et-all-items"><?php _e( 'All Items Label', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-all-items-label" placeholder="All" name="et_option[et_all_items_label]" value="<?php
                if ( isset( $et_option[ 'et_all_items_label' ] ) ) {
                    echo esc_attr( $et_option[ 'et_all_items_label' ] );
                }
                ?>">
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Taxonomy/Category', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[select_filter_taxonomy]" class="et-filter-taxonomy">
                    <option value="" <?php if ( isset( $et_option[ 'select_filter_taxonomy' ] ) && $et_option[ 'select_filter_taxonomy' ] == '' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', ET_TD ); ?></option>
                    <?php
                    $post_type = (isset( $et_option[ 'post_type' ] )) ? esc_attr( $et_option[ 'post_type' ] ) : 'post';
                    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
                    $exclude = array( 'post_format' );
                    // Filter out all unwanted post types
                    foreach ( $taxonomies as $key => $value ) {
                        if ( in_array( $key, $exclude ) ) {
                            unset( $taxonomies[ $key ] );
                        }
                    }
                    if ( is_array( $taxonomies ) ) {
                        foreach ( $taxonomies as $tax ) {
                            $value = $tax -> name;
                            $label = $tax -> label;
                            ?>
                            <option value="<?php echo $value;
                            ?>" <?php if ( isset( $et_option[ 'select_filter_taxonomy' ] ) && $et_option[ 'select_filter_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                                    <?php
                                }
                            }
                            ?>
                </select>
                <p class="description"><?php _e( 'Please note the taxonomy will be listed according to the post type selected in post setting block', ET_TD ); ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Terms Type', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label><input type="radio" value="all" name="et_option[filter_terms_type]" <?php
                    if ( isset( $et_option[ 'filter_terms_type' ] ) ) {
                        checked( $et_option[ 'filter_terms_type' ], 'all' );
                    }
                    ?> class="et-filter-terms-type"/><?php _e( "All", ET_TD ); ?></label>
                <label><input type="radio" value="specific" name="et_option[filter_terms_type]" <?php
                    if ( isset( $et_option[ 'filter_terms_type' ] ) ) {
                        checked( $et_option[ 'filter_terms_type' ], 'specific' );
                    }
                    ?>  class="et-filter-terms-type"/><?php _e( 'Specific', ET_TD ); ?></label>
                <div class="et-specific-wrap" <?php if ( isset( $et_option[ 'filter_terms_type' ] ) && $et_option[ 'filter_terms_type' ] == 'specific' ) { ?> style="display:block;" <?php } else {
                        ?>
                         style = "display:none;"
                         <?php
                     }
                     ?>>
                         <?php
                         global $form;
                         if ( ! empty( $et_option[ 'select_filter_taxonomy' ] ) ) {
                             $select_taxonomy = $et_option[ 'select_filter_taxonomy' ];
                         } else {
                             $select_taxonomy = 'category';
                         }
                         $field_title = 'et_option[filter]';
                         $terms = get_terms( $select_taxonomy, array( 'hide_empty' => 0 ) );
                         $categoryHierarchy = array();
                         if ( is_array( $terms ) ) {
                             $this -> et_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
                             $form .= '<div class="et-checkbox-wrap">';
                             if ( ! empty( $et_option[ 'filter' ] ) ) {
                                 $selected_term = $et_option[ 'filter' ];
                                 if ( count( $categoryHierarchy ) > 0 ) {
                                     $form .= $this -> et_print_checkbox( $categoryHierarchy, '', $field_title, $selected_term );
                                 }
                             } else {
                                 $form .= $this -> et_print_checkbox( $categoryHierarchy, '', $field_title );
                             }

                             $form .= '</div>';
                             echo $form;
                         }
                         ?>
                </div>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Filter Template', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[et_filter_template]" class="et-filter-template">
                    <?php
                    $filter_styles = array(
                        'Tablet template',
                        'Active tab template',
                        'Bar template',
                        'Diamond template',
                        'Tab template'
                    );
                    $f = 1;
                    foreach ( $filter_styles as $filter_style ) {
                        ?>
                        <option value="template-<?php echo $f; ?>" <?php if ( ! empty( $et_option[ 'et_filter_template' ] ) ) selected( $et_option[ 'et_filter_template' ], 'template-' . $f ); ?>><?php echo $filter_style; ?></option>
                        <?php
                        $f ++;
                    }
                    ?>
                </select>
                <div class="et-filter-demo et-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                        if ( isset( $et_option[ 'et_filter_template' ] ) ) {
                            $option_value = $et_option[ 'et_filter_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="et-filter-common" id="et-filter-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                            <img src=" <?php echo ET_IMG_DIR . '/demo/filter/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <p class="description"><?php _e( 'Note: Filter is only available for Vertical and One Side Layout' ) ?></p>
    </div>
</div>