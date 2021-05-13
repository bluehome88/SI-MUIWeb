<?php
/*
* Plugin Name: Candy FAQ
* Description: Candy FAQ - Smart WordPress FAQ with Analytics and Instant Search
* Plugin URI: https://codecanyon.net/item/candy-faq-smart-wordpress-faq-with-analytics-and-instant-search/21327986?ref=KonstruktStudio
* Author: KonstruktStudio
* Author URI: https://codecanyon.net/user/konstruktstudio/portfolio?ref=KonstruktStudio
* Version: 1.1.0
*/

namespace KSCF;

// main props
define(__NAMESPACE__ . '\PLUGIN_VERSION', '1.1.0');
define(__NAMESPACE__ . '\PLUGIN_VAR', 'CandyFAQ');
define(__NAMESPACE__ . '\OPTION_PREFIX', 'mkb_option_');
define(__NAMESPACE__ . '\OPTION_KEY', 'candy-faq-options');
define(__NAMESPACE__ . '\WPML_DOMAIN', 'CandyFAQ');

// post types
define(__NAMESPACE__ . '\FEEDBACK_CPT', 'kscf_feedback');
define(__NAMESPACE__ . '\FAQ_CPT', 'kscf_faq');
define(__NAMESPACE__ . '\FAQ_CPT_CATEGORY', 'kscf_faq_category');

// post meta fields
define(__NAMESPACE__ . '\LIKE_FIELD', '_kscf_likes');
define(__NAMESPACE__ . '\LIKE_META_FIELD', '_kscf_likes_meta');
define(__NAMESPACE__ . '\DISLIKE_FIELD', '_kscf_dislikes');
define(__NAMESPACE__ . '\DISLIKE_META_FIELD', '_kscf_dislikes_meta');
define(__NAMESPACE__ . '\VIEW_FIELD', '_kscf_views');
define(__NAMESPACE__ . '\VIEW_META_FIELD', '_kscf_views_meta');

// paths & URLs
define(__NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ));
define(__NAMESPACE__ . '\IMG_URL', PLUGIN_URL . 'assets/img/');
define(__NAMESPACE__ . '\CSS_PREFIX', 'candy-faq/css/');
define(__NAMESPACE__ . '\CSS_CLASS', 'kscf-');
define(__NAMESPACE__ . '\JS_PREFIX', 'candy-faq/js/');
define(__NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path(__FILE__));
define(__NAMESPACE__ . '\THEME_DIR', get_stylesheet_directory());

// init app
require_once(PLUGIN_DIR . 'lib/app.php');

function init() {
	global $candy_faq;
	$candy_faq = new App();
}
add_action('init', 'KSCF\init', 0);
