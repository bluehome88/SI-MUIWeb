<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

require_once(PLUGIN_DIR . 'lib/helpers/icon-options.php');

/**
 * Class PostTypes
 * Manages custom post type creation and edit pages
 */
class PostTypes {

	private $info;

	/**
	 * Constructor
	 */
	public function __construct($deps) {

		$this->setup_dependencies($deps);

		// post types
		add_action('init', array($this, 'register_post_types'), 10);
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
	 * Registers all configured custom post types
	 */
	public function register_post_types() {
		$this->register_faq_cpt();
		$this->register_faq_taxonomy();
	}

	/**
	 * Registers FAQ custom post type
	 */
	private function register_faq_cpt() {
		/**
		 * FAQ
		 */
		$faq_labels = array(
			'name' => 'FAQ',
			'singular_name' => 'FAQ',
			'menu_name' => 'Candy FAQ',
			'all_items' => 'All questions',
			'view_item' => 'View question',
			'add_new_item' => 'Add new question',
			'add_new' => 'Add new question',
			'edit_item' => 'Edit question',
			'update_item' => 'Update question',
			'search_items' => 'Search question',
			'not_found' => 'Questions not found',
			'not_found_in_trash' => 'Questions not found in trash',
		);

		$faq_args = array(
			'description' => __( 'FAQ', 'candy-faq' ),
			'labels' => $faq_labels,
			'supports' => array(
				'title',
				'editor',
				'author',
				'revisions'
			),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'show_in_admin_bar' => false,
			'menu_position' => 5,
			'menu_icon' => IMG_URL . 'faq-icon.png',
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => ! (bool) Options::option('faq_include_in_search'),
			'publicly_queryable' => (bool) Options::option('faq_enable_pages'),
			'capability_type' => 'post',
			'rewrite' => array(
				"slug" => Options::option('faq_slug'),
				"with_front" => true
			)
		);

		register_post_type( FAQ_CPT, $faq_args );
	}

	/**
	 * Registers FAQ categories
	 */
	private function register_faq_taxonomy() {
		$args = array(
			'labels' => array(
				'name' => __( 'Categories', 'candy-faq' ),
				'add_new_item' => __( 'Add category', 'candy-faq' ),
				'new_item_name' => __( 'New category', 'candy-faq' )
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		);

		register_taxonomy(
			FAQ_CPT_CATEGORY,
			FAQ_CPT,
			$args
		);
	}
}
