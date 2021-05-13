<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$et_option = get_post_meta( $post_id, 'et_option', true );
//$this -> print_array( $et_option );
?>
<div class="et-backend-outer-wrap">
    <div class="et-menu-wrapper">
        <ul class="et-menu-tab">
            <li data-menu="post-settings" class="et-tab-tigger et-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'Post Settings', ET_TD ) ?>
            </li>
            <li data-menu="layout-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'Layout Settings', ET_TD ) ?>
            </li>
            <li data-menu="general-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-admin-generic"></span>
                <?php _e( 'General Settings', ET_TD ) ?>
            </li>
            <li data-menu="social-share-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-share"></span>
                <?php _e( 'Social Share Settings', ET_TD ) ?>
            </li>
            <li data-menu="filter-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-filter"></span>
                <?php _e( 'Filter Settings', ET_TD ) ?>
            </li>
            <li data-menu="product-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-cart"></span>
                <?php _e( 'Product Settings', ET_TD ) ?>
            </li>
        </ul>
    </div>
    <div class ="et-settings-wrap et-active-container" data-menu-ref="post-settings">
        <?php include(ET_PATH . 'inc/admin/settings/et-post.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="layout-settings">
        <?php include(ET_PATH . 'inc/admin/settings/et-layout.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="general-settings">
        <?php include(ET_PATH . 'inc/admin/settings/et-general.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="social-share-settings">
        <?php include(ET_PATH . 'inc/admin/settings/et-social.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="filter-settings">
        <?php include(ET_PATH . 'inc/admin/settings/et-filter.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="product-settings">
        <?php include(ET_PATH . 'inc/admin/settings/et-product.php'); ?>
    </div>
</div>
<div class="et-fb-outer-wrapper">
    <div class="et-fb-menu-wrapper">
        <ul class="et-fb-menu-tab">
            <li data-menu="post-settings" class="et-fb-tab-tigger et-fb-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'Post Settings', ET_TD ) ?>
            </li>
            <li data-menu="layout-settings" class="et-fb-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'Layout Settings', ET_TD ) ?>
            </li>
        </ul>
    </div>
    <div class ="et-fb-settings-wrap et-fb-active-container" data-menu-ref="post-settings">
        <?php include(ET_PATH . 'inc/admin/fb/fb-post.php'); ?>
    </div>
    <div class ="et-fb-settings-wrap" data-menu-ref="layout-settings">
        <?php include(ET_PATH . 'inc/admin/fb/fb-layout.php'); ?>
    </div>
</div>
<div class="et-twitter-outer-wrapper">
    <div class="et-twitter-menu-wrapper">
        <ul class="et-twitter-menu-tab">
            <li data-menu="post-settings" class="et-twitter-tab-tigger et-twitter-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'Post Settings', ET_TD ) ?>
            </li>
            <li data-menu="layout-settings" class="et-twitter-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'Layout Settings', ET_TD ) ?>
            </li>
        </ul>
    </div>
    <div class ="et-twitter-settings-wrap et-twitter-active-container" data-menu-ref="post-settings">
        <?php include(ET_PATH . 'inc/admin/twitter/twitter-post.php'); ?>
    </div>
    <div class ="et-twitter-settings-wrap" data-menu-ref="layout-settings">
        <?php include(ET_PATH . 'inc/admin/twitter/twitter-layout.php'); ?>
    </div>
</div>

