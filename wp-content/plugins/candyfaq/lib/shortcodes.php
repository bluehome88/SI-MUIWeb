<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

class Shortcodes {

	private $shortcodes = array();
	private $settings_helper;

	/**
	 * Constructor
	 */
	public function __construct () {

		// add Visual Composer custom fields
		$this->extend_vc();

		$this->shortcodes = array(
			new FAQShortcode()
		);

		foreach($this->shortcodes as $shortcode) {
			$shortcode->register();
		}

		add_action( 'init', array($this, 'mce_buttons'), 9999 );
	}

	public function extend_vc() {
		if ( !defined( 'WPB_VC_VERSION' ) ) {
			return;
		}

		$this->settings_helper = new SettingsBuilder(array("vc" => true));

		$script_url = PLUGIN_URL . 'assets/js/admin/vc.js?v=' . PLUGIN_VERSION;

		vc_add_shortcode_param( 'mkb_layout_select' , array($this, 'vc_control_layout_select'), $script_url );
		vc_add_shortcode_param( 'mkb_term_select' , array($this, 'vc_control_term_select'), $script_url );
		vc_add_shortcode_param( 'mkb_css_size' , array($this, 'vc_control_css_size'), $script_url );
		vc_add_shortcode_param( 'mkb_image_select' , array($this, 'vc_control_image_select'), $script_url );
		vc_add_shortcode_param( 'mkb_checkbox' , array($this, 'vc_control_checkbox'), $script_url );
	}

	public function vc_control_css_size ($settings, $value) {
		unset($settings["description"]);

		ob_start();
		$this->settings_helper->css_size($value, array(
			"id" => $settings['param_name'],
			"label" => '',
			"default" => isset($settings['value']) ? $settings['value'] : '',
		));
		return ob_get_clean();
	}

	public function vc_control_checkbox ($settings, $value) {
		unset($settings["description"]);

		ob_start();
		$this->settings_helper->toggle($value, array(
			"id" => $settings['param_name'],
			"label" => '',
			"default" => isset($settings['value']) ? $settings['value'] : '',
		));
		return ob_get_clean();
	}

	public function vc_control_layout_select ($settings, $value) {
		unset($settings["description"]);

		ob_start();
		$this->settings_helper->layout_select($value, array(
			"id" => $settings['param_name'],
			"label" => '',
			"options" => $settings['value'],
			"default" => isset($settings['std']) ? $settings['std'] : '',
		));

		return ob_get_clean();
	}

	public function vc_control_term_select ($settings, $value) {
		unset($settings["description"]);

		ob_start();
		$this->settings_helper->term_select($value, array(
			"id" => $settings['param_name'],
			"label" => '',
			"tax" => $settings['tax'],
			"default" => isset($settings['std']) ? $settings['std'] : '',
		));

		return ob_get_clean();
	}

	public function vc_control_image_select ($settings, $value) {
		unset($settings["description"]);

		ob_start();
		$this->settings_helper->image_select($value, array(
			"id" => $settings['param_name'],
			"label" => '',
			"options" => $settings['options'],
			"default" => isset($settings['std']) ? $settings['std'] : '',
		));

		return ob_get_clean();
	}

	/**
	 * Gets shortcode options by id
	 * @param $id
	 */
	public function get_options_for($id) {
		foreach($this->shortcodes as $shortcode) {
			if ($shortcode->get_id() == $id) {
				return $shortcode->get_options();
			}
		}

		return array();
	}

	public function mce_buttons() {
		add_filter( 'mce_external_plugins', array($this, 'add_buttons') );
		add_filter( 'mce_buttons', array($this, 'register_buttons') );
	}

	public function add_buttons( $plugin_array ) {
		$plugin_array['candyfaq'] = PLUGIN_URL . 'assets/js/admin/editor.js';
		return $plugin_array;
	}

	public function register_buttons( $buttons ) {
		array_push( $buttons, 'candyfaq' );
		return $buttons;
	}
}
