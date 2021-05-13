<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$key = $this -> et_generate_random_string( 15 );
$custom_key = 'custom_' . $key;
$custom_prefix = "et_option[et_custom][$custom_key]";
?>
<div class="et-each-meta-container-wrap">
    <div class="et-delete-meta-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class = "et-post-option-wrap">
        <label><?php _e( 'Meta Keys', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label><input type="radio" value="pre-available" name="<?php echo esc_attr( $custom_prefix . '[multiple_meta_key_type]' ); ?>" class="et-multiple-meta-keys"/><?php _e( "Pre Available Meta Keys", ET_TD ); ?></label>
            <label><input type="radio" value="other" name="<?php echo esc_attr( $custom_prefix . '[multiple_meta_key_type]' ); ?>" class="et-multiple-meta-keys"/><?php _e( 'Other Meta Keys', ET_TD ); ?></label>
            <div class ="et-pre-multiple-key-wrap" style="display: none;">
                <?php
                $post_meta_table = $wpdb -> postmeta;
                $meta_keys = $wpdb -> get_results( "SELECT DISTINCT(meta_key) FROM $post_meta_table" );
                ?>
                <select class="et-pre-multiple-metakey" name="<?php echo esc_attr( $custom_prefix . '[et_pre_multiple_meta_key]' ); ?>">
                    <option value=""><?php _e( 'None' ); ?></option>
                    <?php
                    foreach ( $meta_keys as $meta_key ) {
                        ?>
                        <option value="<?php echo $meta_key -> meta_key; ?>"><?php echo $meta_key -> meta_key; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="et-multiple-other-key-wrap" style="display: none;">
                <input type="text" class="et-multiple-other-key"  name="<?php echo esc_attr( $custom_prefix . '[et_multiple_other_key]' ); ?>"  value=""/>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Meta Value', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <input type="text" class="et-multiple-meta-value"  name="<?php echo esc_attr( $custom_prefix . '[et_multiple_meta_value]' ); ?>"  value=""/>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Compare', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="<?php echo esc_attr( $custom_prefix . '[et_compare_operator]' ); ?>" class="et-compare-post">
                <option value="="><?php _e( 'Equal To', ET_TD ) ?></option>
                <option value="!="><?php _e( 'Not Equal To', ET_TD ) ?></option>
                <option value=">"><?php _e( 'Greater Than', ET_TD ) ?></option>
                <option value=">="><?php _e( 'Greater Than Equal To', ET_TD ) ?></option>
                <option value="<"><?php _e( 'Smaller Than', ET_TD ) ?></option>
                <option value="<="><?php _e( 'Smaller Than Equal To', ET_TD ) ?></option>
                <option value="LIKE"><?php _e( 'Like', ET_TD ) ?></option>
                <option value="NOT LIKE"><?php _e( 'Not Like', ET_TD ) ?></option>
                <option value="IN"><?php _e( 'In', ET_TD ) ?></option>
                <option value="NOT IN"><?php _e( 'Not In', ET_TD ) ?></option>
                <option value="BETWEEN"><?php _e( 'Between', ET_TD ) ?></option>
                <option value="NOT BETWEEN"><?php _e( 'Not Between', ET_TD ) ?></option>
                <option value="EXISTS"><?php _e( 'Exists', ET_TD ) ?></option>
                <option value="NOT EXISTS"><?php _e( 'Not Exists', ET_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="et-custom-type-main-wrap">
        <div class ="et-post-option-wrap">
            <label for="et-show-type-check" class="et-show-type">
                <?php _e( 'Type', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-type-filter et-checkbox" value="0" name="<?php echo esc_attr( $custom_prefix . '[et_show_type_filter]' ); ?>"/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to filter logo by custom field type', ET_TD ) ?></p>
                <div class="et-type-filter-wrap" style="display: none;">
                    <select name="<?php echo esc_attr( $custom_prefix . '[et_field_compare_type]' ); ?>" class="et-field-compare-type">
                        <option value="NUMERIC"><?php _e( 'Numeric', ET_TD ) ?></option>
                        <option value="BINARY"><?php _e( 'Binary', ET_TD ) ?></option>
                        <option value="CHAR"><?php _e( 'Char', ET_TD ) ?></option>
                        <option value="DATETIME"><?php _e( 'Date Time', ET_TD ) ?></option>
                        <option value="DECIMAL"><?php _e( 'Decimal', ET_TD ) ?></option>
                        <option value="SIGNED"><?php _e( 'Signed', ET_TD ) ?></option>
                        <option value="TIME"><?php _e( 'Time', ET_TD ) ?></option>
                        <option value="UNSIGNED"><?php _e( 'Unsigned', ET_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>