<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

require_once(PLUGIN_DIR . 'lib/vendor/Mobile_Detect.php');

/**
 * Class Info
 * Holds and caches all needed info for currently rendered entity
 */
class Info {

	private $is_ajax;

	private $is_admin;

	private $is_client;
	
	private $is_desktop;
	
	private $is_tablet;
	
	private $is_mobile;

	private $is_wpml;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->get_initial_info();
	}

	/**
	 * Gets all non-lazy properties
	 */
	private function get_initial_info() {
		$this->get_device_info();
	}

	/**
	 * Gets device info
	 */
	private function get_device_info() {
		$detect = new \KST_Mobile_Detect();

		$this->is_desktop = false;
		$this->is_tablet = false;
		$this->is_mobile = false;

		if ( $detect->isTablet() ) {
			$this->is_tablet = true;
		} else if($detect->isMobile() ) {
			$this->is_mobile = true;
		} else {
			$this->is_desktop = true;
		}

		$detect = null;
	}

	public function is_ajax() {
		if (isset($this->is_ajax)) {
			return $this->is_ajax;
		}

		$this->is_ajax = (defined('DOING_AJAX') && DOING_AJAX);

		return $this->is_ajax;
	}

	/**
	 * Detects admin side
	 * @return bool
	 */
	public function is_admin() {
		if (isset($this->is_admin)) {
			return $this->is_admin;
		}

		$this->is_admin = is_admin();

		return $this->is_admin;
	}

	/**
	 * Detects client side
	 * @return bool
	 */
	public function is_client() {
		if (isset($this->is_client)) {
			return $this->is_client;
		}

		$this->is_client = !$this->is_admin();

		return $this->is_client;
	}

	/**
	 * Flag for desktop devices
	 * @return mixed
	 */
	public function is_desktop () {
		return $this->is_desktop;
	}

	/**
	 * Flag for desktop devices
	 * @return mixed
	 */
	public function is_tablet () {
		return $this->is_tablet;
	}

	/**
	 * Flag for desktop devices
	 * @return mixed
	 */
	public function is_mobile () {
		return $this->is_mobile;
	}

	/**
	 * Returns platform string
	 * @return string
	 */
	public function platform() {
		if ($this->is_mobile()) {
			return 'mobile';
		} else if ($this->is_tablet()) {
			return 'tablet';
		} else {
			return 'desktop';
		}
	}

	/**
	 * Detects WPML
	 * @return bool
	 */
	public function is_wpml() {
		$this->is_wpml = defined('ICL_LANGUAGE_CODE');

		return $this->is_wpml;
	}
}