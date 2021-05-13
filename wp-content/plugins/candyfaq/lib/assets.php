<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

require_once(PLUGIN_DIR . 'lib/helpers/fonts.php');

class AssetsLoader {

	private $info;

	private $inline_styles;

	private $ajax;

	/**
	 * Constructor
	 * @param $deps
	 */
	public function __construct($deps) {

		$this->setup_dependencies( $deps );

		add_action( 'wp_enqueue_scripts', array($this, 'client_assets'), 100 );
		add_action( 'admin_enqueue_scripts', array($this, 'admin_assets'), 100 );
	}

	/**
	 * Sets up dependencies
	 * @param $deps
	 */
	private function setup_dependencies($deps) {
		if (isset($deps['info'])) {
			$this->info = $deps['info'];
		}

		if (isset($deps['inline_styles'])) {
			$this->inline_styles = $deps['inline_styles'];
		}

		if (isset($deps['ajax'])) {
			$this->ajax = $deps['ajax'];
		}
	}

	/**
	 * Client-side assets
	 */
	public function client_assets() {
		global $post;

		if (!Options::option( 'use_system_font' ) && !Options::option('dont_load_font')) {
			$all_fonts = kscf_get_all_fonts();
			$google_fonts = $all_fonts['GOOGLE'];
			$google_fonts = $google_fonts["fonts"];
			$selected_family = Options::option( 'style_font' );
			$selected_weights = Options::option( 'style_font_gf_weights' );
			$selected_languages = Options::option( 'style_font_gf_languages' );

			if (isset($google_fonts[$selected_family])) {
				wp_enqueue_style( CSS_PREFIX . 'font', kscf_get_google_font_url(
					$selected_family, $selected_weights, $selected_languages
				), false, null );
			}
		}

		wp_enqueue_style( CSS_PREFIX . 'main', PLUGIN_URL . 'assets/css/dist/main.css', false, PLUGIN_VERSION );

		if (!Options::option('no_font_awesome')) {
			wp_enqueue_style( CSS_PREFIX . 'font-awesome', PLUGIN_URL . 'assets/css/vendor/font-awesome.css', false, null );
		}

		// dynamic styles
		wp_add_inline_style( CSS_PREFIX . 'main', $this->inline_styles->get_css());

		// user custom CSS
		wp_add_inline_style( CSS_PREFIX . 'main', $this->inline_styles->get_custom_css());

		wp_enqueue_script( JS_PREFIX . 'main', PLUGIN_URL . 'assets/js/client/main.js', array( 'jquery' ), PLUGIN_VERSION, true );

		wp_localize_script( JS_PREFIX . 'main', PLUGIN_VAR, $this->get_client_js_data() );
	}

	/**
	 * Gets client side JS data
	 */
	private function get_client_js_data() {
		return array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'ajaxPrefix' => $this->ajax->prefix,
			'siteUrl' => site_url(),
			'platform' => $this->info->platform(),
			'info' => array(),
			'nonce' => array(
				'nonce' => wp_create_nonce( $this->ajax->get_nonce() ),
				'nonceKey' =>$this->ajax->get_nonce_key(),
			),
			'settings' => array(
				'faq_scroll_to_item' => Options::option( 'faq_scroll_to_item' ),
				'faq_scroll_offset' => Options::option( 'faq_scroll_offset' ),
				'show_like_message' => Options::option( 'show_like_message' ),
				'show_dislike_message' => Options::option( 'show_dislike_message' ),
				'enable_feedback' => Options::option( 'enable_feedback' ),
				'feedback_mode' => Options::option( 'feedback_mode' ),
				'track_article_views' => Options::option( 'track_article_views' ),
				'ga_view_category' => Options::option( 'ga_view_category' ),
				'ga_view_action' => Options::option( 'ga_view_action' ),
				'ga_view_label' => Options::option( 'ga_view_label' ),
				'ga_view_value' => Options::option( 'ga_view_value' ),
				'track_article_likes' => Options::option( 'track_article_likes' ),
				'ga_like_category' => Options::option( 'ga_like_category' ),
				'ga_like_action' => Options::option( 'ga_like_action' ),
				'ga_like_label' => Options::option( 'ga_like_label' ),
				'ga_like_value' => Options::option( 'ga_like_value' ),
				'track_article_dislikes' => Options::option( 'track_article_dislikes' ),
				'ga_dislike_category' => Options::option( 'ga_dislike_category' ),
				'ga_dislike_action' => Options::option( 'ga_dislike_action' ),
				'ga_dislike_label' => Options::option( 'ga_dislike_label' ),
				'ga_dislike_value' => Options::option( 'ga_dislike_value' ),
				'track_article_feedback' => Options::option( 'track_article_feedback' ),
				'ga_feedback_category' => Options::option( 'ga_feedback_category' ),
				'ga_feedback_action' => Options::option( 'ga_feedback_action' ),
				'ga_feedback_label' => Options::option( 'ga_feedback_label' ),
				'ga_feedback_value' => Options::option( 'ga_feedback_value' ),
				'faq_filter_open_single' => Options::option( 'faq_filter_open_single' ),
				'faq_slow_animation' => Options::option( 'faq_slow_animation' ),
				'faq_enable_advanced_plurals' => Options::option( 'faq_enable_advanced_plurals' ),
				'questions_singular_numbers' => Options::option( 'questions_singular_numbers' ),
				'questions_pl1_numbers' => Options::option( 'questions_pl1_numbers' ),
				'questions_pl2_numbers' => Options::option( 'questions_pl2_numbers' ),
			),
			'i18n' => array(
				'no-results' => Options::option( 'search_no_results_text' ),
				'results' => Options::option( 'search_results_text' ),
				'result' => Options::option( 'search_result_text' ),
				'questions' => Options::option( 'questions_text' ),
				'questions_p2' => Options::option( 'questions_p2_text' ),
				'question' => Options::option( 'question_text' ),
				'like_message_text' => Options::option( 'like_message_text' ),
				'dislike_message_text' => Options::option( 'dislike_message_text' ),
				'feedback_label' => Options::option( 'feedback_label' ),
				'feedback_submit_label' => Options::option( 'feedback_submit_label' ),
				'feedback_submit_request_label' => Options::option( 'feedback_submit_request_label' ),
				'feedback_info_text' => Options::option( 'feedback_info_text' ),
				'feedback_sent_text' => Options::option( 'feedback_sent_text' ),
			)
		);
	}

	/**
	 * Assets required for admin
	 */
	public function admin_assets() {
		$screen = get_current_screen();

		wp_enqueue_style( CSS_PREFIX . 'admin', PLUGIN_URL . 'assets/css/dist/admin.css', false, PLUGIN_VERSION );
		wp_enqueue_style( CSS_PREFIX . 'admin-font-awesome', PLUGIN_URL . 'assets/css/vendor/font-awesome.css', false, null );

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script('jquery-ui-sortable');

		// toastr
		wp_enqueue_style( CSS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/css/vendor/toastr/toastr.min.css', false, '2.1.3' );
		wp_enqueue_script( JS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/js/vendor/toastr/toastr.min.js', array(), '2.1.3', true );

		/**
		 * Common Admin UI
		 */
		wp_enqueue_script( JS_PREFIX . 'admin-ui', PLUGIN_URL . 'assets/js/admin/ui.js', array(
			'underscore',
			'jquery',
			'wp-color-picker'
		), PLUGIN_VERSION, true );

		wp_localize_script( JS_PREFIX . 'admin-ui', PLUGIN_VAR, $this->get_admin_js_data() );

		wp_enqueue_script( JS_PREFIX . 'admin-faq-edit', PLUGIN_URL . 'assets/js/admin/faq-edit.js', array(
			'jquery',
			JS_PREFIX . 'admin-ui'
		), PLUGIN_VERSION, true );
	}

	/**
	 * Data for admin js
	 * @return array
	 */
	private function get_admin_js_data() {
		return array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'ajaxPrefix' => $this->ajax->prefix,
			'siteUrl' => site_url(),
			'info' => array(),
			'nonce' => array(
				'nonce' => wp_create_nonce( $this->ajax->get_nonce() ),
				'nonceKey' => $this->ajax->get_nonce_key(),
			),
			'i18n' => array(
				'no-results' => Options::option('search_no_results_text'),
				'results' => Options::option('search_results_text'),
				'result' => Options::option('search_result_text'),
				'loading' => __('Loading...', 'candy-faq' ),
				'faq' => __('FAQ', 'candy-faq' ),
				'select-shortcode' => __('Select shortcode', 'candy-faq' ),
				'loading-options' => __('Loading options...', 'candy-faq' ),
				'configure-shortcode' => __('Configure shortcode', 'candy-faq' ),
				'update' => __('Update', 'candy-faq' ),
				'insert' => __('Insert', 'candy-faq' ),
				'more-than-one-shortcode' => __('More than 1 shortcode selected, cannot parse', 'candy-faq' ),
				'shortcodes' => __('Candy FAQ. Select added shortcode in editor and click this to edit', 'candy-faq' ),
				'reset-confirm' => __('Are you sure you want to reset all the settings?', 'candy-faq' ),
			),
			'optionPrefix' => OPTION_PREFIX,
			'settings' => array()
		);
	}
}