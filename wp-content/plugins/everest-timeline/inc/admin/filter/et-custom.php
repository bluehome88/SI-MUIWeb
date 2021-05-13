<?php
global $wpdb;
?>
<div class ="et-post-option-wrap">
    <label for="et-show-custom-query" class="et-custom-relation">
        <?php _e( 'Filter Custom Field Post', ET_TD ); ?>
    </label>
    <div class="et-post-field-wrap">
        <label class="et-switch">
            <input type="checkbox" class="et-fetch-custom-field-post et-checkbox" value="<?php
            if ( isset( $et_option[ 'et_show_custom_query' ] ) ) {
                echo esc_attr( $et_option[ 'et_show_custom_query' ] );
            } else {
                echo '0';
            }
            ?>" name="et_option[et_show_custom_query]" <?php if ( isset( $et_option[ 'et_show_custom_query' ] ) && $et_option[ 'et_show_custom_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="et-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show posts associated with a certain custom field.', ET_TD ) ?></p>
    </div>
</div>
<div class="et-custom-field-wrapper" <?php if ( isset( $et_option[ 'et_show_custom_query' ] ) && $et_option[ 'et_show_custom_query' ] == '1' ) { ?>
         style="display: block;" <?php } else { ?>
         style="display: none;" <?php } ?>>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Custom Field Query Types', ET_TD ); ?></label>
        <div class="et-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="et-tooltip-info">
                <ul>
                    <li>
                        <?php _e( "Single Custom Field Handling: Display post where the meta key is 'price' and the meta value that is LESS THAN OR EQUAL TO 22", ET_TD ); ?>

                    </li>
                    <li>
                        <?php _e( "Multiple Custom Field Handling: Display posts that have meta key 'color' NOT LIKE value 'blue' OR meta key 'price' with values BETWEEN 20 and 100", ET_TD ); ?>

                    </li>
                </ul>
            </span>
        </div>
        <div class="et-post-field-wrap">
            <select name="et_option[et_custom_field_type]" class="et-custom-field-type">
                <option value="single_field"  <?php if ( isset( $et_option[ 'et_custom_field_type' ] ) && $et_option[ 'et_custom_field_type' ] == 'single_field' ) echo 'selected == "selected"'; ?>><?php _e( 'Single Custom Field Handling', ET_TD ) ?></option>
                <option value="multiple_field"  <?php if ( isset( $et_option[ 'et_custom_field_type' ] ) && $et_option[ 'et_custom_field_type' ] == 'multiple_field' ) echo 'selected == "selected"'; ?>><?php _e( 'Multiple Custom Field Handling', ET_TD ) ?></option>
            </select>

        </div>
    </div>
    <div class="et-meta-key-wrap">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Meta Keys', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label><input type="radio" value="pre-available" name="et_option[meta_keys_type]" <?php
                    if ( isset( $et_option[ 'meta_keys_type' ] ) ) {
                        checked( $et_option[ 'meta_keys_type' ], 'pre-available' );
                    }
                    ?> class="et-meta-key-type"/><?php _e( "Pre Available Meta Keys", ET_TD ); ?></label>
                <label><input type="radio" value="other" name="et_option[meta_keys_type]" <?php
                    if ( isset( $et_option[ 'meta_keys_type' ] ) ) {
                        checked( $et_option[ 'meta_keys_type' ], 'other' );
                    }
                    ?>  class="et-meta-key-type"/><?php _e( 'Other Meta Keys', ET_TD ); ?></label>
                <div class="et-other-meta-wrap" <?php if ( isset( $et_option[ 'meta_keys_type' ] ) && $et_option[ 'meta_keys_type' ] == 'pre-available' ) { ?> style="display: none;" <?php } ?>>
                    <input type="text" class="et-other-meta-key" placeholder="<?php _e( 'Enter meta key', ET_TD ); ?>" name="et_option[et_other_meta_key]"  value="<?php
                    if ( isset( $et_option[ 'et_other_meta_key' ] ) ) {
                        echo $et_option[ 'et_other_meta_key' ];
                    }
                    ?>"/>
                </div>
                <div class="et-pre-meta-key-wrap" <?php if ( isset( $et_option[ 'meta_keys_type' ] ) && $et_option[ 'meta_keys_type' ] == 'other' ) { ?> style="display:none;" <?php } ?>>
                    <?php
                    $post_meta_table = $wpdb -> postmeta;
                    $meta_keys = $wpdb -> get_results( "SELECT DISTINCT(meta_key) FROM $post_meta_table" );
                    ?>
                    <select class="et-pre-metakey" name="et_option[pre_meta_key]">
                        <option value=""><?php _e( 'None' ); ?></option>
                        <?php
                        foreach ( $meta_keys as $meta_key ) {
                            ?>
                            <option value="<?php echo $meta_key -> meta_key; ?>"  <?php if ( isset( $et_option[ 'pre_meta_key' ] ) && $et_option[ 'pre_meta_key' ] == $meta_key -> meta_key ) echo 'selected == "selected"'; ?>><?php echo $meta_key -> meta_key; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Meta Value Type', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_meta_value_type]" class="et-meta-value-type">
                <option value="string"  <?php if ( isset( $et_option[ 'et_meta_value_type' ] ) && $et_option[ 'et_meta_value_type' ] == 'string' ) echo 'selected=="selected"'; ?>><?php _e( 'String', ET_TD ) ?></option>
                <option value="number"  <?php if ( isset( $et_option[ 'et_meta_value_type' ] ) && $et_option[ 'et_meta_value_type' ] == 'number' ) echo 'selected=="selected"'; ?>><?php _e( 'Number', ET_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="et-meta-value-wrap">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Enter Meta Value', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-meta-value"  name="et_option[et_meta_value]"  value="<?php
                if ( isset( $et_option[ 'et_meta_value' ] ) ) {
                    echo esc_attr( $et_option[ 'et_meta_value' ] );
                }
                ?>"/>
                <p class="description"><?php _e( "Please leave empty if don't need to filter from meta value", ET_TD ); ?></p>
            </div>
        </div>
    </div>
    <div class="et-meta-number-wrap" style="display:none;">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Meta Value Number', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="number" min="1" class="et-meta-value-number"  name="et_option[et_meta_value_number]"  value="<?php
                if ( isset( $et_option[ 'et_meta_value_number' ] ) ) {
                    echo $et_option[ 'et_meta_value_number' ];
                }
                ?>"/>
                <p class="description"><?php _e( "Please leave empty if don't need to filter from meta value number", ET_TD ); ?></p>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Compare', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_compare_operator]" class="et-compare-post">
                <option value="="  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == '=' ) echo 'selected=="selected"'; ?>><?php _e( 'Equal To', ET_TD ) ?></option>
                <option value="!="  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == '!=' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Equal To', ET_TD ) ?></option>
                <option value=">"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == '>' ) echo 'selected=="selected"'; ?>><?php _e( 'Greater Than', ET_TD ) ?></option>
                <option value=">="  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == '>=' ) echo 'selected=="selected"'; ?>><?php _e( 'Greater Than Equal To', ET_TD ) ?></option>
                <option value="<"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == '<' ) echo 'selected=="selected"'; ?>><?php _e( 'Smaller Than', ET_TD ) ?></option>
                <option value="<="  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == '<=' ) echo 'selected=="selected"'; ?>><?php _e( 'Smaller Than Equal To', ET_TD ) ?></option>
                <option value="LIKE"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'LIKE' ) echo 'selected=="selected"'; ?>><?php _e( 'Like', ET_TD ) ?></option>
                <option value="NOT LIKE"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'NOT LIKE' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Like', ET_TD ) ?></option>
                <option value="IN"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'IN' ) echo 'selected=="selected"'; ?>><?php _e( 'In', ET_TD ) ?></option>
                <option value="NOT IN"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'NOT IN' ) echo 'selected=="selected"'; ?>><?php _e( 'Not In', ET_TD ) ?></option>
                <option value="BETWEEN"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'BETWEEN' ) echo 'selected=="selected"'; ?>><?php _e( 'Between', ET_TD ) ?></option>
                <option value="NOT BETWEEN"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'NOT BETWEEN' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Between', ET_TD ) ?></option>
                <option value="EXISTS"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'Exists', ET_TD ) ?></option>
                <option value="NOT EXISTS"  <?php if ( isset( $et_option[ 'et_compare_operator' ] ) && $et_option[ 'et_compare_operator' ] == 'NOT EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Exists', ET_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="et-multiple-custom-field-wrap" style="display: none;">
        <div class ="et-post-option-wrap">
            <label for="et-show-relation-blogs" class="et-relation-bogs">
                <?php _e( 'Relation', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-custom-relation et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_custom_relation' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_custom_relation' ] );
                    } else {
                        echo 0;
                    }
                    ?>" name="et_option[et_show_custom_relation]" <?php if ( isset( $et_option[ 'et_show_custom_relation' ] ) && $et_option[ 'et_show_custom_relation' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show relation between meta queries', ET_TD ) ?></p>
            </div>
        </div>
        <div class="et-relation-main-wrap" <?php if ( isset( $et_option[ 'et_show_custom_relation' ] ) && $et_option[ 'et_show_custom_relation' ] == '1' ) { ?> style="display: block;" <?php } else { ?>  style="display: none;" <?php } ?>>
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Relation', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[et_relation_field]" class="et-relation-field">
                        <option value="AND"  <?php if ( isset( $et_option[ 'et_relation_field' ] ) && $et_option[ 'et_relation_field' ] == 'AND' ) echo 'selected=="selected"'; ?>><?php _e( 'AND', ET_TD ) ?></option>
                        <option value="OR"  <?php if ( isset( $et_option[ 'et_relation_field' ] ) && $et_option[ 'et_relation_field' ] == 'OR' ) echo 'selected=="selected"'; ?>><?php _e( 'OR', ET_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="et-custom-field-inner-wrap">
            <?php
            if ( isset( $et_option[ 'et_custom' ] ) && is_array( $et_option[ 'et_custom' ] ) ) {
                $et_custom_count = count( $et_option[ 'et_custom' ] );
            } else {
                $et_custom_count = 0;
            }
            if ( $et_custom_count > 0 ) {

                foreach ( $et_option[ 'et_custom' ] as $custom_key => $custom_detail ) {
                    include(ET_PATH . 'inc/admin/forms/et-blog-detail.php');
                }
            }
            ?>
        </div>
        <div class="et-query-button">
            <input type="button" class="button-primary et-add-meta-query" value="<?php _e( 'Add New Meta Condition', ET_TD ); ?>">
        </div>
    </div>
</div>