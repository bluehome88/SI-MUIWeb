<?php

if (!defined('ABSPATH'))
    die('Direct access forbidden.');
/**
 * Include static files: javascript and css for backend
 */
wp_enqueue_style('xs-admin', BIZIPRESS_CSS . '/xs_admin.css', null, BIZIPRESS_VERSION);
wp_enqueue_style( 'themify-icons', BIZIPRESS_CSS . '/icon-font.css', null, BIZIPRESS_VERSION );

wp_enqueue_script('xs-admin-js', BIZIPRESS_SCRIPTS . '/xs-admin.js', null, BIZIPRESS_VERSION);
