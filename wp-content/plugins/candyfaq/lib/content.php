<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

/**
 * Class Content
 * Manges content rendering
 */
class Content {

	private $info;

	/**
	 * Constructor
	 * @param $deps
	 */
	public function __construct($deps) {

		$this->setup_dependencies($deps);

		// body classes
		add_filter('body_class', array($this, 'body_class_filter'));
	}

	/**
	 * Sets up dependencies
	 * @param $deps
	 */
	private function setup_dependencies($deps) {
		if (isset($deps['info'])) {
			$this->info = $deps['info'];
		}
	}

	/**
	 * Body extra classes
	 * @param $classes
	 * @return array
	 */
	public function body_class_filter($classes) {

		// device classes
		if ( $this->info->is_tablet() ) {
			$classes[] = 'ks-tablet';
		} else if ( $this->info->is_mobile() ) {
			$classes[] = 'ks-mobile';
		} else {
			$classes[] = 'ks-desktop';
		}

		$classes[] = 'candy-faq-version-' . str_replace('.', '-', strtolower(PLUGIN_VERSION));

		return $classes;
	}
}
