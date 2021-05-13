<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
?>
<div class="et-post-setting-outer-wrap">

    <div class="et-post-selection-wrap">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Post Type', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <?php
                $post_types = get_post_types();
                // Post types to exclude
                $exclude = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'everesttimeline', 'page' );
                // Filter out all unwanted post types
                foreach ( $post_types as $key => $value ) {
                    if ( in_array( $key, $exclude ) ) {
                        unset( $post_types[ $key ] );
                    }
                }
                if ( is_array( $post_types ) ) {
                    ?>
                    <select  name="et_option[post_type]" class="et-post-type">
                        <?php
                        foreach ( $post_types as $key => $value ) {
                            ?>
                            <option value="<?php echo $key; ?>" <?php if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == $key ) echo 'selected=="selected"'; ?>><?php echo $value; ?></option>
                        <?php }
                        ?>
                    </select>
                <?php } ?>
            </div>
        </div>
        <div class="et-query-wrapper">
            <ul class="et-query-tab">
                <li data-menu="taxonomy-settings" class="et-query-tigger et-query-active">
                    <?php _e( 'Taxonomies/Categories', ET_TD ) ?>
                </li>
                <li data-menu="custom-settings" class="et-query-tigger">
                    <?php _e( 'Custom Field', ET_TD ) ?>
                </li>
                <li data-menu="search-settings" class="et-query-tigger">
                    <?php _e( 'Search Keyword', ET_TD ) ?>
                </li>
                <li data-menu="popular-settings" class="et-query-tigger">
                    <?php _e( 'Popular Post', ET_TD ) ?>
                </li>
            </ul>
        </div>
        <div class ="et-query-setting-wrap et-active-field" data-menu-ref="taxonomy-settings">
            <?php include(ET_PATH . 'inc/admin/filter/et-taxonomy.php'); ?>
        </div>
        <div class ="et-query-setting-wrap" data-menu-ref="custom-settings">
            <?php include(ET_PATH . 'inc/admin/filter/et-custom.php'); ?>
        </div>
        <div class ="et-query-setting-wrap" data-menu-ref="search-settings">
            <?php include(ET_PATH . 'inc/admin/filter/et-search.php'); ?>
        </div>
        <div class ="et-query-setting-wrap" data-menu-ref="popular-settings">
            <?php include(ET_PATH . 'inc/admin/filter/et-popular.php'); ?>
        </div>
        <div class="et-separation-wrap">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Order', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[et_select_order]" class="et-select-order">
                        <option value="ASC"  <?php if ( isset( $et_option[ 'et_select_order' ] ) && $et_option[ 'et_select_order' ] == 'ASC' ) echo 'selected=="selected"'; ?>><?php _e( 'Ascending', ET_TD ) ?></option>
                        <option value="DESC"  <?php if ( isset( $et_option[ 'et_select_order' ] ) && $et_option[ 'et_select_order' ] == 'DESC' ) echo 'selected=="selected"'; ?>><?php _e( 'Descending', ET_TD ) ?></option>
                    </select>
                </div>
            </div>
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Post Status', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[et_select_post_status]" class="et-select-post-status">
                        <option value="publish"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'publish' ) echo 'selected=="selected"'; ?>><?php _e( 'Publish', ET_TD ) ?></option>
                        <option value="pending"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'pending' ) echo 'selected=="selected"'; ?>><?php _e( 'Pending', ET_TD ) ?></option>
                        <option value="draft"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'draft' ) echo 'selected=="selected"'; ?>><?php _e( 'Draft', ET_TD ) ?></option>
                        <option value="auto-draft"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'auto-draft' ) echo 'selected=="selected"'; ?>><?php _e( 'Auto Draft', ET_TD ) ?></option>
                        <option value="future"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'future' ) echo 'selected=="selected"'; ?>><?php _e( 'Future', ET_TD ) ?></option>
                        <option value="private"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'private' ) echo 'selected=="selected"'; ?>><?php _e( 'Private', ET_TD ) ?></option>
                        <option value="inherit"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'inherit' ) echo 'selected=="selected"'; ?>><?php _e( 'Inherit', ET_TD ) ?></option>
                        <option value="trash"  <?php if ( isset( $et_option[ 'et_select_post_status' ] ) && $et_option[ 'et_select_post_status' ] == 'trash' ) echo 'selected=="selected"'; ?>><?php _e( 'Trash', ET_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>