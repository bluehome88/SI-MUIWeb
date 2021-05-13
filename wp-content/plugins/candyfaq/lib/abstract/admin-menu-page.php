<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

/**
 * Interface KST_MenuPage_Interface
 * Common WP Dashboard Edit Screen with meta boxes
 */
interface KST_MenuPage_Interface {

	/**
	 * Registers admin menu page
	 * @return mixed
	 */
	public function add_menu_page ();
}