<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$et_option = get_post_meta( $post_id, 'et_option', true );
//$this -> print_array( $et_option );
?>
<div class="et-feed-type-wrapper">
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Fetch Post From', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_fetch_post]" class="et-fetch-post">
                <option value="wp-post"  <?php if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'wp-post' ) echo 'selected=="selected"'; ?>><?php _e( 'Wordpress Post', ET_TD ) ?></option>
                <option value="twitter-feed"  <?php if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'twitter-feed' ) echo 'selected=="selected"'; ?>><?php _e( 'Twitter Feed', ET_TD ) ?></option>
                <option value="facebook-post"  <?php if ( isset( $et_option[ 'et_fetch_post' ] ) && $et_option[ 'et_fetch_post' ] == 'facebook-post' ) echo 'selected=="selected"'; ?>><?php _e( 'Facebook Post', ET_TD ) ?></option>
            </select>
        </div>
    </div>
</div>