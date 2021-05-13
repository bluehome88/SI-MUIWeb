<?php

/**
 * functions.php
 *
 * The theme's functions and definitions.
 */
/**
 * 1.0 - Define constants. Current Version number & Theme Name.
 */
define('BIZIPRESS_THEME', 'Bizipress WordPress Theme');
define('BIZIPRESS_VERSION', '1.0');
define('BIZIPRESS_THEMEROOT', get_template_directory_uri());
define('BIZIPRESS_THEMEROOT_DIR', get_template_directory());
define('BIZIPRESS_IMAGES', BIZIPRESS_THEMEROOT . '/assets/images');
define('BIZIPRESS_IMAGES_DIR', BIZIPRESS_THEMEROOT_DIR . '/assets/images');
define('BIZIPRESS_CSS', BIZIPRESS_THEMEROOT . '/assets/css');
define('BIZIPRESS_CSS_DIR', BIZIPRESS_THEMEROOT_DIR . '/assets/css');
define('BIZIPRESS_SCRIPTS', BIZIPRESS_THEMEROOT . '/assets/js');
define('BIZIPRESS_SCRIPTS_DIR', BIZIPRESS_THEMEROOT_DIR . '/assets/js');
define('BIZIPRESS_PHPSCRIPTS', BIZIPRESS_THEMEROOT . '/assets/php');
define('BIZIPRESS_PHPSCRIPTS_DIR', BIZIPRESS_THEMEROOT_DIR . '/assets/php');
define('BIZIPRESS_INC', BIZIPRESS_THEMEROOT_DIR . '/inc');
define( 'BIZIPRESS_REMOTE_CONTENT', 'http://xpeedstudio.net/demo-content/bizipress' );







/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if (!isset($content_width)) {
    $content_width = 800;
}



/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if (!function_exists('bizipress_setup')) {

    function bizipress_setup() {
	/**
	 * Make the theme available for translation.
	 */
	$lang_dir = BIZIPRESS_THEMEROOT . '/languages';
	load_theme_textdomain('bizipress', $lang_dir);

	/**
	 * Add support for post formats.
	 */
	add_theme_support('post-formats', array()
	);

	/**
	 * Add support for automatic feed links.
	 */
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');


	/**
	 * Add support for post thumbnails.
	 */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(750, 465, array('center', 'center')); // Hard crop center center
//	add_image_size('bizipress-blog-thumb', 750, 460, TRUE);



	/**
	 * Register nav menus.
	 */
	register_nav_menus(
		array(
		    'primary' => esc_html__('Main Menu', 'bizipress')
		)
	);
	register_nav_menus(
		array(
		    'top_menu' => esc_html__('Top Menu', 'bizipress')
		)
	);
	register_nav_menus(
		array(
		    'footer' => esc_html__('Footer Menu', 'bizipress')
		)
	);
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
	    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));
    }

    add_action('after_setup_theme', 'bizipress_setup');
}

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - theme INC.
 * ----------------------------------------------------------------------------------------
 */
include_once get_template_directory() . '/inc/init.php';

