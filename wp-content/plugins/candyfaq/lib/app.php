<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

// legacy WordPress support
require_once(PLUGIN_DIR . 'lib/polyfill.php');

// abstract
require_once(PLUGIN_DIR . 'lib/abstract/admin-edit-screen.php');
require_once(PLUGIN_DIR . 'lib/abstract/admin-menu-page.php');
require_once(PLUGIN_DIR . 'lib/abstract/admin-submenu-page.php');
require_once(PLUGIN_DIR . 'lib/abstract/shortcode.php');

// global modules
require_once(PLUGIN_DIR . 'lib/options.php');
require_once(PLUGIN_DIR . 'lib/info.php');

// helpers
require_once(PLUGIN_DIR . 'lib/helpers/settings-builder.php');
require_once(PLUGIN_DIR . 'lib/helpers/terms-helper.php');
require_once(PLUGIN_DIR . 'lib/helpers/template-helper.php');
require_once(PLUGIN_DIR . 'lib/helpers/analytics.php');

// modules
require_once(PLUGIN_DIR . 'lib/cpt.php');
require_once(PLUGIN_DIR . 'lib/content.php');
require_once(PLUGIN_DIR . 'lib/assets.php');
require_once(PLUGIN_DIR . 'lib/styles.php');
require_once(PLUGIN_DIR . 'lib/ajax.php');

// shortcodes
require_once(PLUGIN_DIR . 'lib/shortcodes/faq.php');
require_once(PLUGIN_DIR . 'lib/shortcodes.php');

// admin menu pages and edit screens
require_once(PLUGIN_DIR . 'lib/pages/sorting.php');
require_once(PLUGIN_DIR . 'lib/pages/settings.php');
require_once(PLUGIN_DIR . 'lib/pages/dashboard.php');
require_once(PLUGIN_DIR . 'lib/pages/faq-edit.php');

/**
 * Class App
 * Main App Controller,
 * creates all module instances and passes down dependencies
 */
class App {

	// holds current render info
	public $info;

	// custom post types controller
	private $cpt;

	// restriction module
	public $restrict;

	// manages content rendering
	public $content;

	// manages content parts rendering via actions
	public $actions;

	// inline styles manager
	private $inline_styles;

	// assets manager
	private $assets;

	// ajax manager
	private $ajax;

	// shortcodes manager
	public $shortcodes;

	// analytics manager
	private $analytics;

	// sorting menu page controller
	private $sorting_page;

	// settings menu page controller
	private $settings_page;

	// dashboard menu page controller
	private $dashboard_page;

	// faq item page controller
	private $faq_page;

	/**
	 * App entry
	 */
	public function __construct() {

		// global info model
		$this->info = new Info();

		// custom post types
		$this->cpt = new PostTypes(array(
			'info' => $this->info
		));

		if ($this->info->is_client()) {
			// inline styles module
			$this->inline_styles = new DynamicStyles(array(
				'info' => $this->info
			));
		}

		if ($this->info->is_admin()) {
			$this->analytics = new Analytics();
		}

		// ajax manager
		$this->ajax = new Ajax(array(
			'info' => $this->info,
			'analytics' => $this->analytics
		));

		// assets manager
		$this->assets = new AssetsLoader(array(
			'info' => $this->info,
			'inline_styles' => $this->inline_styles,
			'ajax' => $this->ajax
		));

		// shortcodes manager
		$this->shortcodes = new Shortcodes();

		/**
		 * Admin menu pages
		 */
		if ($this->info->is_admin()) {
			$this->sorting_page = new SortingPage( array(
				'info' => $this->info,
				'ajax' => $this->ajax
			) );

			$this->dashboard_page = new DashboardPage( array(
				'analytics' => $this->analytics
			) );

			$this->settings_page = new SettingsPage( array(
				'info' => $this->info,
				'ajax' => $this->ajax
			) );

			$this->faq_page = new FAQEditScreen( array(
				'analytics' => $this->analytics
			) );
		}
	}
}