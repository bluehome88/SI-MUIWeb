<?php

/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

use \WP_Query;

/**
 * Custom tree walker
 * Class SortingTermsTree
 * @package KSCF
 */
class SortingTermsTree extends TermsTree {
	/**
	 * Renders single term
	 * @param $term
	 */
	protected function render_tree_item($term, $path) {
		?>
		<span class="mkb-sorting-tree-item fn-mkb-sorting-tree-item"
			  data-id="<?php echo esc_attr($term->term_id); ?>">
			<i class="fa fa-folder"></i>
			<?php echo esc_html($term->name); ?>
			<div class="mkb-term-posts fn-mkb-posts-wrap"
			     data-term-id="<?php echo esc_attr($term->term_id); ?>">
				<?php
				$query_args = array(
					'post_type' => FAQ_CPT,
					'posts_per_page' => - 1,
					'ignore_sticky_posts' => 1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => FAQ_CPT_CATEGORY,
							'field' => 'slug',
							'terms' => $term->slug,
							'include_children' => false
						),
					)
				);

				$loop = new WP_Query($query_args);

				if ( $loop->have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post();
						?>
					<div class="mkb-sorting-tree-post fn-mkb-sorting-tree-post"
						       data-id="<?php esc_attr_e(get_the_ID()); ?>">
						<i class="fa fa-question-circle"></i>
						<?php the_title(); ?>
						</div>
					<?php
					endwhile;
				endif;

				wp_reset_postdata();
				?>
			</div>
		</span>
	<?php
	}
}

/**
 * Class SortingPage
 * Sorting page controller
 */
class SortingPage implements KST_SubmenuPage_Interface {

	private $info;

	private $ajax;

	const SCREEN_BASE = 'kscf_faq_page_faq-sorting';

	/**
	 * Constructor
	 * @param $deps
	 */
	public function __construct($deps) {

		$this->setup_dependencies( $deps );

		add_action( 'admin_menu', array( $this, 'add_submenu_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_assets' ) );
	}

	/**
	 * Sets up dependencies
	 * @param $deps
	 */
	private function setup_dependencies($deps) {
		if (isset($deps['info'])) {
			$this->info = $deps['info'];
		}

		if (isset($deps['ajax'])) {
			$this->ajax = $deps['ajax'];
		}
	}

	/**
	 * Adds menu entry
	 */
	public function add_submenu_page() {
		add_submenu_page(
			'edit.php?post_type=' . FAQ_CPT,
			__( 'Sorting', 'candy-faq' ),
			__( 'Sorting', 'candy-faq' ),
			'manage_options',
			'faq-sorting',
			array( $this, 'submenu_html' )
		);
	}

	/**
	 * Page HTML
	 */
	public function submenu_html() {
		?>
		<div class="mkb-admin-page-header">
			<span class="mkb-header-logo mkb-header-item" data-version="v<?php echo esc_attr(PLUGIN_VERSION); ?>">
				<img class="logo-img" src="<?php echo esc_attr(IMG_URL . 'logo.png'); ?>" title="logo" />
			</span>
			<span class="mkb-header-title mkb-header-item"><?php echo __( 'Sorting', 'candy-faq' ); ?></span>
			<a href="#" id="mkb-plugin-sorting-save" class="mkb-action-button mkb-action-default mkb-header-item"
			   title="<?php esc_attr_e('Save Order', 'candy-faq'); ?>"><?php echo __( 'Save Order', 'candy-faq' ); ?></a>
		</div>

		<form class="mkb-plugin-page-wrap mkb-loading mkb-sorting-form js-mkb-sorting-form" novalidate
			data-taxonomy="<?php esc_attr_e(FAQ_CPT_CATEGORY); ?>">
			<div class="mkb-plugin-page-preloader">
				<div class="mkb-loader">
					<span class="inner1"></span>
					<span class="inner2"></span>
					<span class="inner3"></span>
				</div>
			</div>
			<div class="mkb-plugin-page-content">

				<div class="mkb-sorting-content fn-mkb-sorting-container">
					<h3><?php esc_html_e('FAQ Sorting', 'candy-faq'); ?></h3>

					<p><?php esc_html_e('Drag n drop items within each category to reorder them. Press Save Order when done.', 'candy-faq'); ?></p>
					<p><?php esc_html_e('Note: this only works when custom order is enabled in settings.', 'candy-faq'); ?></p>

					<div>
						<?php
						$terms_helper = new SortingTermsTree(array(
							'taxonomy' => FAQ_CPT_CATEGORY
						));

						$tree = $terms_helper->get_tree();

						?>
						<div class="mkb-sorting-tree fn-mkb-sorting-tree">
							<?php
							$terms_helper->render_tree($tree);
							?>
						</div>

					</div>
				</div>

			</div>
		</form>
	<?php
	}

	/**
	 * Loads admin assets
	 */
	public function load_assets() {

		$screen = get_current_screen();

		if ( $screen->base !== self::SCREEN_BASE ) {
			return;
		}

		wp_enqueue_script( 'jquery-ui-sortable' );

		// toastr
		wp_enqueue_style( CSS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/css/vendor/toastr/toastr.min.css', false, '2.1.3' );
		wp_enqueue_script( JS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/js/vendor/toastr/toastr.min.js', array(), '2.1.3', true );

		wp_enqueue_script( JS_PREFIX . 'admin-sorting', PLUGIN_URL . 'assets/js/admin/sorting.js', array(
			'jquery',
			JS_PREFIX . 'admin-ui',
			JS_PREFIX . 'admin-toastr'
		), PLUGIN_VERSION, true );
	}
}
