<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Class Vc_Page
 */
class Vc_Page {
	protected $slug;
	protected $title;
	protected $templatePath;

	/**
	 * @return string
	 *
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * @param mixed $slug
	 *
	 * @return $this;
	 */
	public function setSlug( $slug ) {
		$this->slug = (string) $slug;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 *
	 * @return $this
	 */
	public function setTitle( $title ) {
		$this->title = (string) $title;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTemplatePath() {
		return $this->templatePath;
	}

	/**
	 * @param mixed $templatePath
	 *
	 * @return $this
	 */
	public function setTemplatePath( $templatePath ) {
		$this->templatePath = $templatePath;

		return $this;
	}

	public function render() {
		vc_include_template( $this->getTemplatePath(), array(
			'page' => $this,
		) );
	}
}
