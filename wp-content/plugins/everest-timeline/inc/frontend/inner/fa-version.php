<?php

$et_common_settings = get_option( 'et_common_settings' );
$version_font = (isset( $et_common_settings[ 'font_version' ] ) && $et_common_settings[ 'font_version' ] != '') ? esc_attr( $et_common_settings[ 'font_version' ] ) : 'old_version';
if ( $version_font == 'old_version' ) {
    $facebook = 'fa fa-facebook';
    $twitter = 'fa fa-twitter';
    $google_plus = 'fa fa-google-plus';
    $linkedin = 'fa fa-linkedin';
    $email = 'fa fa-envelope-o';
    $pinterest = 'fa fa-pinterest';
    $author = '';
    $comment = '';
    $tag_icon = 'fa fa-tags';
    $thumb = '';
    $folder = 'fa fa-folder-open';
    $cart_icon = 'fa fa-shopping-cart';
} else {
    $facebook = 'fab fa-facebook-f';
    $twitter = 'fab fa-twitter';
    $google_plus = 'fab fa-google-plus-g';
    $linkedin = 'fab fa-linkedin-in';
    $email = 'far fa-envelope-open';
    $pinterest = 'fab fa-pinterest-p';
    $folder = 'far fa-folder-open';
    $tag_icon = 'fas fa-tags';
    $cart_icon = 'fas fa-shopping-cart';
}