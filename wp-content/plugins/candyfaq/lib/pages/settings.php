<?php

/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

/**
 * Settings page controller
 * Class SettingsPage
 */

namespace KSCF;

/**
 * Class SettingsPage
 * Settings page controller
 */
class SettingsPage implements KST_SubmenuPage_Interface {

	private $info;

	private $ajax;

	const SCREEN_BASE = 'kscf_faq_page_faq-settings';

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
	 * Adds settings menu
	 */
	public function add_submenu_page() {
		add_submenu_page(
			'edit.php?post_type=' . FAQ_CPT,
			__( 'Settings', 'candy-faq' ),
			__( 'Settings', 'candy-faq' ),
			'manage_options',
			'faq-settings',
			array( $this, 'submenu_html' )
		);
	}

	/**
	 * Settings menu HTML
	 */
	public function submenu_html() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'candy-faq' ) );
		}

		$settings_helper = new SettingsBuilder(); // TODO: refactor this

		?>
		<div class="mkb-admin-page-header">
			<span class="mkb-header-logo mkb-header-item" data-version="v<?php echo esc_attr(PLUGIN_VERSION); ?>">
				<img class="logo-img" src="<?php echo esc_attr(IMG_URL . 'logo.png'); ?>" title="logo" />
			</span>
			<span class="mkb-header-title mkb-header-item"><?php echo __( 'Settings', 'candy-faq' ); ?></span>
			<a href="#" id="mkb-plugin-settings-save" class="mkb-action-button mkb-action-default mkb-header-item"
			   title="<?php esc_attr_e('Save Settings', 'candy-faq'); ?>"><?php echo __( 'Save Settings', 'candy-faq' ); ?></a>
			<a href="#" id="mkb-plugin-settings-reset" class="mkb-action-button mkb-action-danger mkb-header-item"
			   title="<?php esc_attr_e('Restore defaults', 'candy-faq'); ?>"><?php echo __( 'Restore defaults', 'candy-faq' ); ?></a>
		</div>

		<form id="mkb-plugin-settings" class="mkb-loading" novalidate>
			<div class="mkb-plugin-settings-preloader">
				<div class="mkb-loader">
					<span class="inner1"></span>
					<span class="inner2"></span>
					<span class="inner3"></span>
				</div>
			</div>
			<div class="mkb-settings-content-holder">
				<?php

				$options = Options::get_options();

				$settings_helper->render_tab_links( $options );

				?>
				<div class="mkb-settings-content fn-mkb-settings-container">
					<?php
					foreach ( $options as $option ):
						$settings_helper->render_option(
							$option["type"],
							Options::option( $option["id"] ),
							$option
						);
					endforeach;

					$settings_helper->close_tab_container();
					?>
				</div>
				<?php
				?>
			</div>
		</form>
	<?php
	}

	/**
	 * Loads settings page admin assets
	 */
	public function load_assets() {

		$screen = get_current_screen();

		if ( $screen->base !== self::SCREEN_BASE ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );

		// toastr
		wp_enqueue_style( CSS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/css/vendor/toastr/toastr.min.css', false, '2.1.3' );

		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( JS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/js/vendor/toastr/toastr.min.js', array(), '2.1.3', true );

		wp_enqueue_script( JS_PREFIX . 'admin-settings', PLUGIN_URL . 'assets/js/admin/settings.js', array(
			'jquery',
			'wp-color-picker',
			JS_PREFIX . 'admin-ui',
			JS_PREFIX . 'admin-toastr'
		), PLUGIN_VERSION, true );
	}
}
