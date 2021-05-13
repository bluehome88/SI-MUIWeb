<?php
if (!defined('FW')) {
    die('Forbidden');
}

/*
 * view process section 
 */

$xs_menu_list = '';
if($atts['xs_menu_list'] != ''){
    $xs_menu_list = $atts['xs_menu_list'];
}

$nav_menu_args = array(
	'fallback_cb' => '',
	'menu'        => $xs_menu_list,
   'menu_class'  => 'xs-custom-menu'
);

wp_nav_menu( $nav_menu_args );