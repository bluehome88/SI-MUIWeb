<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

/**
 * Interface KST_EditScreen_Interface
 * Common WP Dashboard Edit Screen with meta boxes
 */
interface KST_EditScreen_Interface {

	/**
	 * Registers admin page meta boxes
	 * @return mixed
	 */
	public function add_meta_boxes ();

	/**
	 * Saves meta box values
	 * @return mixed
	 */
	public function save_post ($post_id);

	/**
	 * Use entity_html() for callbacks
	 */
}