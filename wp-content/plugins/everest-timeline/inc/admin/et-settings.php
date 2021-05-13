<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$et_option = get_post_meta( $post_id, 'et_option', true );
//$this -> print_array( $et_option );
?>
<!--other settings-->
<div class="et-other-settings-container">
    <div class="et-other-menu-wrapper">
        <ul class="et-other-menu-tab">
            <li data-menu="lightbox-settings" class="et-other-tab-tigger et-other-active">
                <span class="dashicons dashicons-editor-expand"></span>
                <?php _e( 'Lightbox Settings', ET_TD ) ?>
            </li>
            <li data-menu="animation-settings" class="et-other-tab-tigger">
                <span class="dashicons dashicons-admin-generic"></span>
                <?php _e( 'Animation Settings', ET_TD ) ?>
            </li>
            <li data-menu="scrolling-settings" class="et-other-tab-tigger">
                <span class="dashicons dashicons-menu"></span>
                <?php _e( 'Scrolling Navigation Settings', ET_TD ) ?>
            </li>
        </ul>
    </div>
    <div class ="et-other-settings-wrap et-other-active-container" data-menu-ref="lightbox-settings">
        <?php include(ET_PATH . 'inc/admin/other/et-lightbox.php'); ?>
    </div>
    <div class ="et-other-settings-wrap" data-menu-ref="animation-settings">
        <?php include(ET_PATH . 'inc/admin/other/et-animation.php'); ?>
    </div>
    <div class ="et-other-settings-wrap" data-menu-ref="scrolling-settings">
        <?php include(ET_PATH . 'inc/admin/other/et-scrolling.php'); ?>
    </div>
</div>